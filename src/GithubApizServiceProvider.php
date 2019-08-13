<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/11/19
 * Time: 12:06 PM
 */

namespace HashemiRafsan\GithubApiz;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use HashemiRafsan\GithubApiz\Facades\GithubApiz as GithubFacade;

class GithubApizServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerConfig();
    }

    public function register()
    {
        $this->registerGithubApiz();
    }

    protected function registerConfig()
    {
        $source = realpath(__DIR__ . '/../config/githubapiz.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('githubapiz.php')]);
        }

        $this->mergeConfigFrom($source, 'githubapiz');
    }

    protected function registerGithubApiz()
    {
        $this->app->bind('githubapiz', function() {
           return new GithubApiz();
        });

        $this->app->alias('githubapiz', GithubFacade::class);
    }

    public function provides()
    {
        return [
            'githubapiz'
        ];
    }
}
