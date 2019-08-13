<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/11/19
 * Time: 12:56 PM
 */

namespace HashemiRafsan\GithubApiz\Traits;


use HashemiRafsan\GithubApiz\Interfaces\RepositoryInterface;
use HashemiRafsan\GithubApiz\Interfaces\UserInterface;

trait Repositories
{
    public function getUserRepositories()
    {
        $this->callUrl = $this->getUserRepositoriesUrl();
        return $this->callRequest('GET', [
            'authorization' => true
        ]);
    }

    public function getRepositories()
    {
        $this->callUrl = $this->getRepositoriesUrl();
        return $this->callRequest('GET', [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
    }
    public function getUserRepositoriesUrl()
    {
        return $this->getBaseUrl() . UserInterface::GET_USER_REPOS;
    }
    public function getRepositoriesUrl()
    {
        return $this->getBaseUrl() . RepositoryInterface::GET_REPOSITORIES;
    }
}
