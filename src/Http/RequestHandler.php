<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/11/19
 * Time: 9:27 PM
 */

namespace HashemiRafsan\GithubApiz\Http;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Ps7Request;


class RequestHandler
{
    public $http;

    public $method;

    public $headers = [];

    public $parameters = [];

    public function __construct($method, $url, $extra = [])
    {
        $this->http = new Client(['base_url' => $url, 'timeout' => 10.0, 'decode_content' => false]);
        $this->method = $method;
        $this->request = new Ps7Request($method, $url, $extra);
    }

    public function callApi()
    {
        return $this->http->send($this->request)->getBody()->getContents();
    }
}
