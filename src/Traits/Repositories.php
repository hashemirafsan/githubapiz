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
    /*-----------------------------------------------
    -
    -
    -                  REQUEST
    -
    -
    ------------------------------------------------*/
    /**
     * @param $owner
     * @param $repo
     * @param array $parameters
     *
     * @return mixed
     */
    public function updateOwnerRepository($owner, $repo, $parameters = [])
    {
        $this->callUrl = $this->getOwnerRepositoryUrl($owner, $repo);
        return $this->callRequest('PATCH', [
            'authorization' => true,
            'parameters' =>  $parameters
        ]);
    }

    /**
     * @param $owner
     * @param $repo
     *
     * @return mixed
     */
    public function getOwnerRepository($owner, $repo)
    {
        $this->callUrl = $this->getOwnerRepositoryUrl($owner, $repo);
        return $this->callRequest('GET');
    }

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function createOwnRepository($parameters = [])
    {
        $this->callUrl = $this->getOwnRepositoriesUrl();
        return $this->callRequest('POST', [
           'authorization' => true,
           'parameters' =>  $parameters
        ]);
    }

    /**
     * @param $username
     *
     * @return mixed
     */
    public function getOrganizationRepositoriesByUsername($username)
    {
        $this->callUrl = $this->getOrganizationRepositoriesByUsernameUrl($username);
        return $this->callRequest('GET');
    }

    /**
     * @param $username
     *
     * @return mixed
     */
    public function getUserRepositoriesByUsername($username)
    {
        $this->callUrl = $this->getUserRepositoriesByUsernameUrl($username);
        return $this->callRequest('GET');
    }

    /**
     * @return mixed
     */
    public function getOwnRepositories()
    {
        $this->callUrl = $this->getOwnRepositoriesUrl();
        return $this->callRequest('GET', [
            'authorization' => true
        ]);
    }

    /**
     * @return mixed
     */
    public function getPublicRepositories()
    {
        $this->callUrl = $this->getPublicRepositoriesUrl();
        return $this->callRequest('GET');
    }


    /*-----------------------------------------------
    -
    -
    -                  URL
    -
    -
    ------------------------------------------------*/

    public function getOwnerRepositoryUrl($owner, $repo)
    {
        $setUrlPath = str_replace(':owner', $owner, RepositoryInterface::GET_OWNER_REPO);
        $setUrlPath = str_replace(':repo', $repo, $setUrlPath);
        return $this->getBaseUrl() . $setUrlPath;
    }

    /**
     * @param $username
     *
     * @return string
     */
    public function getOrganizationRepositoriesByUsernameUrl($username)
    {
        $withUsernamePath = str_replace(':org', $username, OrganizationInterface::GET_ORGANIZATION_REPOS_BY_NAME);
        return $this->getBaseUrl() . $withUsernamePath;
    }

    /**
     * @param $username
     *
     * @return string
     */
    public function getUserRepositoriesByUsernameUrl($username)
    {
        $withUsernamePath = str_replace(':username', $username, UserInterface::GET_USERS_REPOS_BY_USERNAME);
        return $this->getBaseUrl() . $withUsernamePath;
    }

    /**
     * @return string
     */
    public function getOwnRepositoriesUrl()
    {
        return $this->getBaseUrl() . UserInterface::GET_USER_REPOS;
    }

    /**
     * @return string
     */
    public function getPublicRepositoriesUrl()
    {
        return $this->getBaseUrl() . RepositoryInterface::GET_PUBLIC_REPOSITORIES;
    }
}
