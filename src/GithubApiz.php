<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/11/19
 * Time: 12:44 PM
 */

namespace HashemiRafsan\GithubApiz;

use HashemiRafsan\GithubApiz\Collections\GithubCollection;
use HashemiRafsan\GithubApiz\Http\RequestHandler;
use HashemiRafsan\GithubApiz\Traits\Repositories;
use HashemiRafsan\GithubApiz\Traits\Search;
use HashemiRafsan\GithubApiz\Traits\Teams;
use HashemiRafsan\GithubApiz\Traits\Users;

class GithubApiz
{
    use Search, Users, Repositories, Teams;

    protected $baseUrl = "https://api.github.com";

    protected $callUrl = "";

    protected $client;

    protected $data = "";

    /**
     * @param $url
     */
    public function setBaseUrl($url)
    {
        $this->baseUrl = $url;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param $method
     * @param array $extra
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function callRequest($method, $extra = [])
    {
        return collect((new RequestHandler($method, $this->callUrl, $extra))->callApi());
    }
}
