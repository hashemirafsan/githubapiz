<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/11/19
 * Time: 12:56 PM
 */

namespace HashemiRafsan\GithubApiz\Traits;


use HashemiRafsan\GithubApiz\Interfaces\OrganizationInterface;
use HashemiRafsan\GithubApiz\Interfaces\RepositoryInterface;
use HashemiRafsan\GithubApiz\Interfaces\UserInterface;

trait Repositories
{
    public function createOwnRepository($parameters = [])
    {
        $this->callUrl = $this->getOwnRepositoriesUrl();
        return $this->callRequest('POST', [
           'authorization' => true,
           'parameters' =>  $parameters
        ]);
    }

    public function getOrgnizationRepositoriesByUsername($username)
    {
        $this->callUrl = $this->getOrgnizationRepositoriesByUsernameUrl($username);
        return $this->callRequest('GET');
    }
    public function getUserRepositoriesByUsername($username)
    {
        $this->callUrl = $this->getUserRepositoriesByUsernameUrl($username);
        return $this->callRequest('GET');
    }

    public function getOwnRepositories()
    {
        $this->callUrl = $this->getOwnRepositoriesUrl();
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

    public function getOrgnizationRepositoriesByUsernameUrl($username)
    {
        $withUsernamePath = str_replace(':org', $username, OrganizationInterface::GET_ORGANIZATION_REPOS_BY_NAME);
        return $this->getBaseUrl() . $withUsernamePath;
    }

    public function getUserRepositoriesByUsernameUrl($username)
    {
        $withUsernamePath = str_replace(':username', $username, UserInterface::GET_USERS_REPOS_BY_USERNAME);
        return $this->getBaseUrl() . $withUsernamePath;
    }

    public function getOwnRepositoriesUrl()
    {
        return $this->getBaseUrl() . UserInterface::GET_USER_REPOS;
    }

    public function getRepositoriesUrl()
    {
        return $this->getBaseUrl() . RepositoryInterface::GET_REPOSITORIES;
    }
}
