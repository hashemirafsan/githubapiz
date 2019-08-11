<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/11/19
 * Time: 8:18 PM
 */

namespace HashemiRafsan\GithubApiz\Interfaces;

interface SearchInterface
{
    const GET_SEARCH_REPOSITORY_URL = "/search/repositories?q=ACM_Helper";
    const GET_SEARCH_COMMITS_URL = "/search/commits";
    const GET_SEARCH_CODE_URL = "/search/code";
    const GET_SEARCH_ISSUES_URL = "/search/issues";
    const GET_SEARCH_USERS_URL = "/search/users";
    const GET_SEARCH_TOPICS_URL = "/search/topics";
    const GET_SEARCH_LABELS_URL = "/search/labels";
}
