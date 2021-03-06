<?php
namespace App\Console\Commands;

use App\Models\Topic;
use Illuminate\Console\Command;

class TopicSlugMigration extends Command
{
    protected $signature = 'topics:slug_migration';

    protected $description = '翻译所有 of 标题为 slug';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Topic::chunk(200, function ($topics) {
            foreach ($topics as $topic) {
                $topic->slug = slug_trans($topic->title);
                $topic->save();
                $this->info("Processing is complete：$topic->id");
            }
        });

    }
}
