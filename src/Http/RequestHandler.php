<?php
/**
 * Created by PhpStorm.
 * User: dgdev
 * Date: 8/11/19
 * Time: 9:27 PM
 */

namespace HashemiRafsan\GithubApiz\Http;


use GuzzleHttp\Client;

class RequestHandler
{
    public $http;

    public function __construct($url)
    {
        $this->http = new Client(['base_url' => $url, 'timeout' => 3.0, 'decode_content' => false]);
    }
}
