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
    public function searchRepositories()
    {
        $this->callUrl = $this->getSearchRepositoriesUrl();
        return json_decode($this->callRequest());
    }
    public function getSearchRepositoriesUrl()
    {
        return $this->getBaseUrl() . SearchInterface::GET_SEARCH_REPOSITORY_URL;
    }

    public function getSearchCommitsUrl()
    {
        return $this->getBaseUrl() . SearchInterface::GET_SEARCH_COMMITS_URL;
    }

    public function getSearchCodeUrl()
    {
        return $this->getBaseUrl() . SearchInterface::GET_SEARCH_CODE_URL;
    }

    public function getSearchIssuesUrl()
    {
        return $this->getBaseUrl() . SearchInterface::GET_SEARCH_ISSUES_URL;
    }

    public function getSearchUsersUrl()
    {
        return $this->getBaseUrl() . SearchInterface::GET_SEARCH_USERS_URL;
    }

    public function getSearchTopicsUrl()
    {
        return $this->getBaseUrl() . SearchInterface::GET_SEARCH_TOPICS_URL;
    }
}
