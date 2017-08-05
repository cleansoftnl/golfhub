<?php
namespace App\Policies;

use App\Models\Reply;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    public function delete(Staff $user, Reply $reply)
    {
        return $user->may('manage_topics') || $reply->user_id == $user->id;
    }
}
