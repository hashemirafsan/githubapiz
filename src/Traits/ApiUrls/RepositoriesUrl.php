<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/15/19
 * Time: 5:46 PM
 */

namespace HashemiRafsan\GithubApiz\Traits\ApiUrls;


use HashemiRafsan\GithubApiz\Interfaces\OrganizationInterface;
use HashemiRafsan\GithubApiz\Interfaces\RepositoryInterface;
use HashemiRafsan\GithubApiz\Interfaces\UserInterface;

trait RepositoriesUrl
{
    public function getOwnerRepoTagsUrl($owner, $repo)
    {
        return $this->getOwnerRepositoryUrl($owner, $repo) . RepositoryInterface::GET_OWNER_REPO_TAGS;
    }

    public function getOwnerRepoTeamsUrl($owner, $repo)
    {
        return $this->getOwnerRepositoryUrl($owner, $repo) . RepositoryInterface::GET_OWNER_REPO_TEAMS;
    }

    public function getOwnerRepoLanguageUrl($owner, $repo)
    {
        return $this->getOwnerRepositoryUrl($owner, $repo) . RepositoryInterface::GET_OWNER_REPO_LANGUAGE;
    }

    public function getOwnerRepoContributorsListUrl($owner, $repo)
    {
        return $this->getOwnerRepositoryUrl($owner, $repo) . RepositoryInterface::GET_OWNER_REPO_CONTRIBUTORS;
    }
    /**
     * @param $owner
     * @param $repo
     *
     * @return string
     */
    public function getOwnerRepoAutomatedSecurityFixesUrl($owner, $repo)
    {
        return $this->getOwnerRepositoryUrl($owner, $repo) . RepositoryInterface::GET_OWNER_REPO_AUTOMATED_SECURITY_FIX;
    }

    /**
     * @param $owner
     * @param $repo
     *
     * @return string
     */
    public function getOwnerRepoVulnerabilityUrl($owner, $repo)
    {
        return $this->getOwnerRepositoryUrl($owner, $repo) . RepositoryInterface::GET_OWNER_REPO_VULNERABILITY;
    }

    /**
     * @param $owner
     * @param $repo
     *
     * @return string
     */
    public function getOwnerRepoTopicsUrl($owner, $repo)
    {
        return $this->getOwnerRepositoryUrl($owner, $repo) . RepositoryInterface::GET_OWNER_REPO_TOPICS;
    }

    /**
     * @param $owner
     * @param $repo
     *
     * @return string
     */
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
