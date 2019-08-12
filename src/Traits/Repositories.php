<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/11/19
 * Time: 12:56 PM
 */

namespace HashemiRafsan\GithubApiz\Traits;


use HashemiRafsan\GithubApiz\Interfaces\RepositoryInterface;

trait Repositories
{
    public function getRepositories()
    {
        $this->callUrl = $this->getRepositoriesUrl();
        $this->callRequest('GET', [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
    }
    public function getRepositoriesUrl()
    {
        return $this->getBaseUrl() . RepositoryInterface::GET_REPOSITORIES;
    }
}
