<?php
namespace App\Jobs;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendActivateMail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;

    public function __construct(Staff $user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        return app('Phphub\Handler\EmailHandler')->sendActivateMail($this->user);
    }
}
