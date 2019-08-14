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
}
