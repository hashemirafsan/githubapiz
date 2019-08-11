<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/11/19
 * Time: 1:46 PM
 */

namespace HashemiRafsan\GithubApiz\Facades;

use Illuminate\Support\Facades\Facade;

class GithubApiz extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'githubapiz';
    }
}
