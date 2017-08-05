<?php
namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Staff;
use App\Models\Blog;
use Gate;

class BlogPolicy
{
    use HandlesAuthorization;

    public function update(Staff $user, Blog $blog)
    {
        return $user->isAuthorOf($blog);
    }

    public function manage(Staff $user, Blog $blog)
    {
        return $blog->managers()->where('user_id', $user->id)->count() > 0;
    }

    public function createArticle(Staff $user, Blog $blog)
    {
        return $user->isAuthorOf($blog) || Gate::allows('manage', $blog);
    }
}
