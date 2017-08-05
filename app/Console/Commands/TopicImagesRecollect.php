<?php
namespace App\Console\Commands;

use App\Models\Topic;
use Illuminate\Console\Command;

class TopicImagesRecollect extends Command
{
    protected $signature = 'topics:images_recollect';
    protected $description = '把所有topic里的图片提取出来。';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Topic::chunk(200, function ($topics) {
            foreach ($topics as $topic) {
                $topic->collectImages();
                $this->info("处理完成：$topic->id");
            }
        });
    }
}
