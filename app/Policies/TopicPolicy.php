<?php
namespace App\Policies;

use App\Models\Topic;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    public function show_draft(Staff $user, Topic $topic)
    {
        return $user->may('manage_topics') || $topic->user_id == $user->id;
    }

    public function update(Staff $user, Topic $topic)
    {
        return $user->may('manage_topics') || $topic->user_id == $user->id;
    }

    public function delete(Staff $user, Topic $topic)
    {
        return $user->may('manage_topics') || $topic->user_id == $user->id;
    }

    public function recommend(Staff $user, Topic $topic)
    {
        return $user->may('manage_topics');
    }

    public function wiki(Staff $user, Topic $topic)
    {
        return $user->may('manage_topics');
    }

    public function pin(Staff $user, Topic $topic)
    {
        return $user->may('manage_topics');
    }

    public function sink(Staff $user, Topic $topic)
    {
        return $user->may('manage_topics');
    }

    public function append(Staff $user, Topic $topic)
    {
        return $user->may('manage_topics') || $topic->user_id == $user->id;
    }
}
