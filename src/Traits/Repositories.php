<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/11/19
 * Time: 12:56 PM
 */

namespace HashemiRafsan\GithubApiz\Traits;

use HashemiRafsan\GithubApiz\Exceptions\NullableValueException;
use HashemiRafsan\GithubApiz\Interfaces\HeadersInterface;
use HashemiRafsan\GithubApiz\Traits\ApiUrls\RepositoriesUrl;

trait Repositories
{
    use RepositoriesUrl;

    protected $owner = null;

    protected $repo = null;

    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setRepo($repo)
    {
        $this->repo = $repo;
    }

    public function getRepo()
    {
        return $this->repo;
    }

    public function setOwnerAndRepo($owner, $repo)
    {
        $this->setOwner($owner);
        $this->setRepo($repo);

        return $this;
    }

    /*-----------------------------------------------
    -
    -
    -                  REQUEST
    -
    -
    ------------------------------------------------*/
    /**
     * @param array $parameters
     *
     * @return mixed
     * @throws NullableValueException
     */
    public function updateTopics($parameters = [])
    {
        return $this->updateOwnerRepoTopics(null, null, $parameters);
    }

    /**
     * @param null $owner
     * @param null $repo
     * @param array $parameters
     *
     * @return mixed
     * @throws NullableValueException
     */
    public function updateOwnerRepoTopics($owner = null, $repo = null, $parameters = [])
    {
        if (blank($owner) && !blank($this->getOwner())) {
            $owner = $this->getOwner();
        } else {
            throw new NullableValueException("Owner value should be string, pass null");
        }

        if (blank($repo) && !blank($this->getRepo())) {
            $repo = $this->getRepo();
        } else {
            throw new NullableValueException("Repo value should be string, pass null");
        }

        $this->callUrl = $this->getOwnerRepoTopicsUrl($owner, $repo);
        return $this->callRequest('PUT', [
            'authorization' => true,
            'headers' => [
                'Accept' => HeadersInterface::VND_GITHUB_MERCY_PREVIEW_JSON
            ],
            'parameters' => $parameters
        ]);
    }

    public function getOwnerRepoTopics($owner, $repo)
    {
        $this->callUrl = $this->getOwnerRepoTopicsUrl($owner, $repo);
        return $this->callRequest('GET', [
            'headers' => [
                'Accept' => HeadersInterface::VND_GITHUB_MERCY_PREVIEW_JSON
            ]
        ]);
    }

    /**
     * @param $owner
     * @param $repo
     * @param array $parameters
     *
     * @return mixed
     */
    public function updateOwnerRepository($owner = "", $repo = "", $parameters = [])
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
}
