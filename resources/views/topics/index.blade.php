@extends('layouts.default')

@section('title')
  {{ isset($category) ? $category->name : 'topiclist'  }} @parent
@stop

@section('content')

  <div class="col-md-9 topics-index main-col">

    @if (isset($category) && $category->id == config('phphub.life_category_id'))
      <div class="alert alert-info">
        Welcome to index<a style="text-decoration: underline;" href="https://laravel-china.org/topics/3022/community-posting-and-management">Index index</a>。
      </div>
    @endif
    @if (isset($category) && $category->id == config('phphub.qa_category_id'))
      <div class="alert alert-info">Something Something about newbie questions</div>
    @endif
    @if (isset($category) && $category->id === 1)
      <div class="alert alert-info">
        release Please read carefully before posting <a href="https://laravel-china.org/topics/817/laravel-china-recruitment-post-specification"
                         style="text-decoration: underline;">Laravel China Recruitment stickers release specification</a>，Do not press the standard post will be operation member<a
          href="https://laravel-china.org/topics/2802/description-of-shen" style="text-decoration: underline;">permanent under sinking</a>。<a
          href="{{ route('topics.create', ['category_id' => 1]) }}" class="btn btn-warning">Release</a>
      </div>
    @endif
    <div class="panel panel-default">

      <div class="panel-heading">

        <ul class="list-inline topic-filter">
          <li class="popover-with-html" data-content="Latest Replies">
            <a {!! app(App\Models\Topic::class)->present()->topicFilter('default') !!}>active</a></li>
          <li class="popover-with-html" data-content="Excellent of topic">
            <a {!! app(App\Models\Topic::class)->present()->topicFilter('excellent') !!}>{{ lang('Excellent') }}</a>
          </li>
          <li class="popover-with-html" data-content="upvoted">
            <a {!! app(App\Models\Topic::class)->present()->topicFilter('vote') !!}>{{ lang('Vote') }}</a></li>
          <li class="popover-with-html" data-content="release vote">
            <a {!! app(App\Models\Topic::class)->present()->topicFilter('recent') !!}>{{ lang('Recent') }}</a></li>
          <li class="popover-with-html" data-content="recent of topic">
            <a {!! app(App\Models\Topic::class)->present()->topicFilter('noreply') !!}>{{ lang('Noreply') }}</a></li>
        </ul>

        <div class="clearfix"></div>
      </div>

      @if ( ! $topics->isEmpty())

        <div class="jscroll">
          <div class="panel-body remove-padding-horizontal">
            @include('topics.partials.topics')
          </div>

          <div class="panel-footer text-right remove-padding-horizontal pager-footer">
            <!-- Pager -->
            {!! $topics->appends(Request::except('page', '_pjax'))->render() !!}
          </div>
        </div>

      @else
        <div class="panel-body">
          <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
        </div>
      @endif

    </div>

    <!-- Nodes Listing -->
    @include('nodes.partials.list')

  </div>

  @include('layouts.partials.sidebar')

@stop
