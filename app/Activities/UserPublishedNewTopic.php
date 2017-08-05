<?php
namespace App\Activities;

class UserPublishedNewTopic extends BaseActivity
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
