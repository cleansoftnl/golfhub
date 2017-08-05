<?php
namespace App\Jobs;

use App\Models\Reply;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Phphub\Handler\EmailHandler;

class SendReplyNotifyMail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $reply;

    public function __construct(Reply $reply)
    {
        $this->reply = $reply;
    }

    public function handle()
    {
        EmailHandler::sendReplyNotifyMail($this->reply);
    }
}
