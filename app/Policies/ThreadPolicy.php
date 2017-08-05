<?php
namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Staff;
use App\Models\Thread;
use Gate;

class ThreadPolicy
{
    use HandlesAuthorization;

    public function show(Staff $user, Thread $thread)
    {
        return $thread->hasParticipant($user->id);
    }
}
