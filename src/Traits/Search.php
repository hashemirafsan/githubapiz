<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/11/19
 * Time: 12:54 PM
 */

namespace HashemiRafsan\GithubApiz\Traits;

use HashemiRafsan\GithubApiz\Interfaces\SearchInterface;

trait Search
{
    /**
     * @return mixed
     */
    public function searchRepositories()
    {
        $this->callUrl = $this->getSearchRepositoriesUrl();
        return $this->callRequest('GET', [
            'Accept' => 'application/vnd.github.mercy-preview+json'
        ]);
    }

    /**
     * @return mixed
     */
    public function searchCommit()
    {
        $this->callUrl = $this->getSearchCommitsUrl();
        return $this->callRequest('GET', [
            'Accept' => 'application/vnd.github.cloak-preview',
        ]);
    }

    /**
     * @return mixed
     */
    public function searchIssues()
    {
        $this->callUrl = $this->getSearchIssuesUrl();
        return $this->callRequest('GET', [
            'Accept' => 'application/vnd.github.symmetra-preview+json'
        ]);
    }

    public function searchCode()
    {
        $this->callUrl = $this->getSearchCodeUrl();
        return $this->callRequest('GET');
    }

    /**
     * @return mixed
     */
    public function searchTopics()
    {
        $this->callUrl = $this->getSearchTopicsUrl();
        return $this->callRequest('GET', [
            'Accept' => 'application/vnd.github.mercy-preview+json'
        ]);
    }

    /**
     * @return mixed
     */
    public function searchUsers()
    {
        $this->callUrl = $this->getSearchUsersUrl();
        return $this->callRequest('GET');
    }

    /**
     * @return mixed
     */
    public function searchLabels()
    {
        $this->callUrl = $this->getSearchLabelsUrl();
        return $this->callRequest('GET', [
            'Accept' => 'application/vnd.github.symmetra-preview+json'
        ]);
    }

    /**
     * @return string
     */
    public function getSearchRepositoriesUrl()
    {
        return $this->getBaseUrl() . SearchInterface::GET_SEARCH_REPOSITORY_URL;
    }

    /**
     * @return string
     */
    public function getSearchCommitsUrl()
    {
        return $this->getBaseUrl() . SearchInterface::GET_SEARCH_COMMITS_URL;
    }

    /**
     * @return string
     */
    public function getSearchCodeUrl()
    {
        return $this->getBaseUrl() . SearchInterface::GET_SEARCH_CODE_URL;
    }

    /**
     * @return string
     */
    public function getSearchIssuesUrl()
    {
        return $this->getBaseUrl() . SearchInterface::GET_SEARCH_ISSUES_URL;
    }

    /**
     * @return string
     */
    public function getSearchUsersUrl()
    {
        return $this->getBaseUrl() . SearchInterface::GET_SEARCH_USERS_URL;
    }

    /**
     * @return string
     */
    public function getSearchTopicsUrl()
    {
        return $this->getBaseUrl() . SearchInterface::GET_SEARCH_TOPICS_URL;
    }

    /**
     * @return string
     */
    public function getSearchLabelsUrl()
    {
        return $this->getBaseUrl() . SearchInterface::GET_SEARCH_LABELS_URL;
    }
}
