<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/11/19
 * Time: 12:56 PM
 */

namespace HashemiRafsan\GithubApiz\Traits;


use HashemiRafsan\GithubApiz\Interfaces\TeamInterface;

trait Teams
{
    public function getListTeams($organization)
    {
        $this->callUrl = $this->getListTeamsUrl($organization);
        return $this->callRequest('GET', [
           'Accept' => 'application/vnd.github.hellcat-preview+json'
        ]);
    }

    public function getListTeamsUrl($organization)
    {
        $sub = str_replace(':org', $organization, TeamInterface::GET_LIST_TEAMS);
        return $this->getBaseUrl() . $sub;
    }
}
