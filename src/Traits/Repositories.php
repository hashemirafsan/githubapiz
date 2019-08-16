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
use HashemiRafsan\GithubApiz\Interfaces\HttpVerbsInterface;
use HashemiRafsan\GithubApiz\Traits\ApiUrls\RepositoriesUrl;

trait Repositories
{
    use RepositoriesUrl;

    protected $owner = null;

    protected $repo = null;

    public function setOwner($owner)
    {
        $this->owner = $owner;
        return $this;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setRepo($repo)
    {
        $this->repo = $repo;
        return $this;
    }

    public function getRepo()
    {
        return $this->repo;
    }

    public function setOwnerAndRepo($owner, $repo, $reuse)
    {
        if (!$reuse) {
            $this->setOwner($owner);
            $this->setRepo($repo);
        }
        return $this;
    }

    private function checkOwnerAndRepoExists()
    {
        if (blank($this->getOwner())) {
            throw new NullableValueException("Owner value should be string, pass null");
        }

        if (blank($this->getRepo())) {
            throw new NullableValueException("Repo value should be string, pass null");
        }
    }

    public function getTags()
    {
        return $this->getOwnerRepoTags(null, null, true);
    }

    public function getOwnerRepoTags($owner = null, $repo = null, $reuse = false)
    {
        $this->setOwnerAndRepo($owner, $repo, $reuse)->checkOwnerAndRepoExists();
        $this->callUrl = $this->getOwnerRepoTagsUrl($this->getOwner(), $this->getRepo());
        return $this->callRequest(HttpVerbsInterface::GET);
    }

    public function getTeams()
    {
        return $this->getOwnerRepoTeams(null, null, true);
    }

    public function getOwnerRepoTeams($owner = null, $repo = null, $reuse = false)
    {
        $this->setOwnerAndRepo($owner, $repo, $reuse)->checkOwnerAndRepoExists();
        $this->callUrl = $this->getOwnerRepoTeamsUrl($this->getOwner(), $this->getRepo());
        return $this->callRequest(HttpVerbsInterface::GET);
    }

    public function getLanguages()
    {
        return $this->getOwnerRepoLanguages(null, null, true);
    }

    public function getOwnerRepoLanguages($owner = null, $repo = null, $reuse = false)
    {
        $this->setOwnerAndRepo($owner, $repo, $reuse)->checkOwnerAndRepoExists();
        $this->callUrl = $this->getOwnerRepoLanguageUrl($this->getOwner(), $this->getRepo());
        return $this->callRequest(HttpVerbsInterface::GET);
    }

    public function getContributorsList()
    {
        return $this->getOwnerRepoContributorsList(null, null, true);
    }

    public function getOwnerRepoContributorsList( $owner = null, $repo = null, $reuse = false )
    {
        $this->setOwnerAndRepo($owner, $repo, $reuse)->checkOwnerAndRepoExists();
        $this->callUrl = $this->getOwnerRepoContributorsListUrl($this->getOwner(), $this->getRepo());
        return $this->callRequest(HttpVerbsInterface::GET);
    }

    public function disableAutomatedSecurityFixed()
    {
        return $this->disableOwnerRepoAutomatedSecurityFixes(null, null, true);
    }

    public function disableOwnerRepoAutomatedSecurityFixes($owner = null, $repo = null, $reuse = false)
    {
        $this->setOwnerAndRepo($owner, $repo, $reuse)->checkOwnerAndRepoExists();
        $this->callUrl = $this->getOwnerRepoAutomatedSecurityFixesUrl($this->getOwner(), $this->getRepo());
        return $this->callRequest(HttpVerbsInterface::DELETE, [
            'authorization' => true,
            'headers' => [
                'Accept' => HeadersInterface::VND_GITHUB_LONDON_PREVIEW_JSON
            ]
        ]);
    }

    public function enableAutomatedSecurityFixed()
    {
        return $this->enableOwnerRepoAutomatedSecurityFixes(null, null, true);
    }

    public function enableOwnerRepoAutomatedSecurityFixes($owner = null, $repo = null, $reuse = false)
    {
        $this->setOwnerAndRepo($owner, $repo, $reuse)->checkOwnerAndRepoExists();
        $this->callUrl = $this->getOwnerRepoAutomatedSecurityFixesUrl($this->getOwner(), $this->getRepo());
        return $this->callRequest(HttpVerbsInterface::PUT, [
            'authorization' => true,
            'headers' => [
                'Accept' => HeadersInterface::VND_GITHUB_LONDON_PREVIEW_JSON
            ]
        ]);
    }

    public function disableVulnerabilityAlert()
    {
        return $this->enableOwnerRepoVulnerabilityAlert(null, null, true);
    }

    public function disableOwnerRepoVulnerabilityAlert($owner = null, $repo = null, $reuse = false)
    {
        $this->setOwnerAndRepo($owner, $repo, $reuse)->checkOwnerAndRepoExists();
        $this->callUrl = $this->getOwnerRepoVulnerabilityUrl($this->getOwner(), $this->getRepo());
        return $this->callRequest(HttpVerbsInterface::DELETE, [
            'authorization' => true,
            'headers' => [
                'Accept' => HeadersInterface::VND_GITHUB_DORIAN_PREVIEW_JSON
            ]
        ]);
    }

    public function enableVulnerabilityAlert()
    {
        return $this->enableOwnerRepoVulnerabilityAlert(null, null, true);
    }

    public function enableOwnerRepoVulnerabilityAlert($owner = null, $repo = null, $reuse = false)
    {
        $this->setOwnerAndRepo($owner, $repo, $reuse)->checkOwnerAndRepoExists();
        $this->callUrl = $this->getOwnerRepoVulnerabilityUrl($this->getOwner(), $this->getRepo());
        return $this->callRequest(HttpVerbsInterface::PUT, [
            'authorization' => true,
            'headers' => [
                'Accept' => HeadersInterface::VND_GITHUB_DORIAN_PREVIEW_JSON
            ]
        ]);
    }

    public function getVulnerability()
    {
        return $this->getOwnerRepoVulnerability(null, null, true);
    }

    public function getOwnerRepoVulnerability($owner = null, $repo = null, $reuse = false)
    {
        $this->setOwnerAndRepo($owner, $repo, $reuse)->checkOwnerAndRepoExists();
        $this->callUrl = $this->getOwnerRepoVulnerabilityUrl($this->getOwner(), $this->getRepo());
        return $this->callRequest(HttpVerbsInterface::GET, [
            'authorization' => true,
            'headers' => [
                'Accept' => HeadersInterface::VND_GITHUB_DORIAN_PREVIEW_JSON
            ]
        ]);
    }
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
