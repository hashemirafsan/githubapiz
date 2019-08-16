<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/12/19
 * Time: 12:23 AM
 */

namespace HashemiRafsan\GithubApiz\Interfaces;


interface RepositoryInterface
{
    const GET_PUBLIC_REPOSITORIES = "/repositories";
    const GET_OWNER_REPO = "/repos/:owner/:repo";
    const GET_OWNER_REPO_TOPICS = '/topics';
    const GET_OWNER_REPO_VULNERABILITY = '/vulnerability-alerts';
    const GET_OWNER_REPO_AUTOMATED_SECURITY_FIX = "/automated-security-fixes";
    CONST GET_OWNER_REPO_CONTRIBUTORS = "/contributors";
    CONST GET_OWNER_REPO_LANGUAGE = "/languages";
    CONST GET_OWNER_REPO_TEAMS = "/teams";
    CONST GET_OWNER_REPO_TAGS = "/tags";
}
