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
    const GET_SEARCH_COMMITS_URL = "/search/commits?q=rafsan";
    const GET_SEARCH_CODE_URL = "/search/code?q=addClass+in:file+language:js+repo:jquery/jquery";
    const GET_SEARCH_ISSUES_URL = "/search/issues?q=windows+label:bug+language";
    const GET_SEARCH_USERS_URL = "/search/users?q=hashemirafsan";
    const GET_SEARCH_TOPICS_URL = "/search/topics?q=ruby+is:featured";
    const GET_SEARCH_LABELS_URL = "/search/labels?repository_id=64778136&q=bug+defect+enhancement'";
}
