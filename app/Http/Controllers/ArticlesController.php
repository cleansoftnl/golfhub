<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoreTopicRequest;
use App\Models\Blog;
use App\Models\Post;
use App\Models\Topic;
use Auth;
use Flash;
use Illuminate\Http\Request;
use Phphub\Core\CreatorListener;

class ArticlesController extends Controller implements CreatorListener
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        if ($user->blogs()->count() <= 0) {
            Flash::info('please create a column first，专栏创建成功后才能发布article。');
            return redirect()->route('blogs.create');
        }
        $topic = new Topic;
        $blog = $request->blog_id ? Blog::findOrFail($request->blog_id) : Auth::user()->blogs()->first();
        //$this->authorize('create-article', $blog);
        return view('articles.create_edit', compact('topic', 'user', 'blog'));
    }

    public function store(StoreTopicRequest $request)
    {
        $data = $request->except('_token');
        $blog = Blog::findOrFail($request->blog_id);
        //$this->authorize('create-article', $blog);
        $data['blog_id'] = $blog->id;
        if ($request->subject == 'draft') {
            $data['is_draft'] = 'yes';
        }
        return app('Phphub\Creators\TopicCreator')->create($this, $data, $blog);
    }

    public function transform($id)
    {
        Auth::user()->decrement('topic_count', 1);
        Auth::user()->increment('article_count', 1);
        if (Auth::user()->blogs()->count() <= 0) {
            Flash::info('please create a column first，专栏创建成功后才能发布article。');
            return redirect()->route('blogs.create');
        }
        $topic = Topic::find($id);
        $topic->update([
            'category_id' => config('phphub.blog_category_id')
        ]);
        // attach blog
        $blog = Auth::user()->blogs()->first();
        $blog->topics()->attach($topic->id);
        $blog->increment('article_count', 1);
        // Co-authors
        if (!$blog->authors()->where('user_id', $topic->user_id)->exists()) {
            $blog->authors()->attach($topic->user_id);
        }
        Flash::success(lang('Operation succeeded.'));
        return redirect()->to($topic->link());
    }

    public function show($id)
    {
        // See: TopicsController->show
    }

    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        return view('articles.create_edit', compact('topic'));
    }

    public function update($id, StoreTopicRequest $request)
    {
        // See: TopicsController->update
    }

    /**
     * ----------------------------------------
     * CreatorListener Delegate
     * ----------------------------------------
     */
    public function creatorFailed($error)
    {
        Flash::error('发布failure：' . $error);
        return redirect()->back();
    }

    public function creatorSucceed($topic)
    {
        Flash::success(lang('Operation succeeded.'));
        return redirect()->to($topic->link());
    }
}
