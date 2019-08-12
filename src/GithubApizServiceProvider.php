<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/11/19
 * Time: 12:06 PM
 */

namespace HashemiRafsan\GithubApiz;

use Illuminate\Support\ServiceProvider;
use HashemiRafsan\GithubApiz\Facades\GithubApiz as GithubFacade;

class GithubApizServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->registerGithubApiz();
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
