<?php
namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMaintainerWorksMail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;
    protected $timeFrame;
    protected $content;

    public function __construct(User $user, $timeFrame, $content)
    {
        $this->user = $user;
        $this->timeFrame = $timeFrame;
        $this->content = $content;
    }

    public function handle()
    {
        return app('Phphub\Handler\EmailHandler')->sendMaintainerWorksMail($this->user, $this->timeFrame, $this->content);
    }
}
