<?php
namespace App\Models;

use App\Models\Staff;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    protected $fillable = [];

    public function post()
    {
        return $this->belongsTo('Post');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public static function isUserAttentedTopic(Staff $user, Topic $topic)
    {
        return Attention::where('user_id', $user->id)
            ->where('topic_id', $topic->id)
            ->first();
    }
}