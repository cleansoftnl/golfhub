<?php namespace Phphub\Markdown;

use App;
use Event;
use Illuminate\Support\ServiceProvider;

class MarkdownServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton('Phphub\Markdown\Markdown', function ($app) {
            return new \Phphub\Markdown\Markdown;
        });
    }

    public function provides()
    {
        return ['Phphub\Markdown\Markdown'];
    }
}
