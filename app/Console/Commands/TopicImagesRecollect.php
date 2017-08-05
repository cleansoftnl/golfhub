<?php
namespace App\Console\Commands;

use App\Models\Topic;
use Illuminate\Console\Command;

class TopicImagesRecollect extends Command
{
    protected $signature = 'topics:images_recollect';
    protected $description = 'Extract all the topics in the picture.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Topic::chunk(200, function ($topics) {
            foreach ($topics as $topic) {
                $topic->collectImages();
                $this->info("Processing is complete：$topic->id");
            }
        });
    }
}
