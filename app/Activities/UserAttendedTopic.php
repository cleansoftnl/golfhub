<?php
namespace App\Activities;

class UserAttendedTopic extends BaseActivity
{
    public function generate($user, $topic)
    {
        $this->addTopicActivity($user, $topic);
    }

    public function remove($user, $topic)
    {
        $this->removeBy("u$user->id", "t$topic->id");
    }
}
