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

    public $url;

    public $headers = [];

    public $parameters = [];

    public $extra = [];

    public $decodeContent = false;

    public $timeout = 10.0;

    public $authorization = false;

    public $authorizationKey = false;

    public function __construct($method, $url, $extra = [])
    {
        $this->method = $method;
        $this->url = $url;
        $this->extra = $extra;
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function callApi()
    {
        $this->initHTTP();
        $this->parseExtra();
        $this->addAuthorizationTokenToHeader();
        $this->request = new Ps7Request($this->method, $this->url, $this->headers);
//        dd($this->http->send($this->request)->getBody()->getContents());
        return $this->http->send($this->request)->getBody()->getContents();
    }



    private function parseExtra()
    {
        foreach($this->extra as $key => $value) {
            if (is_array($value)) {
                foreach($value as $valueKey => $valueItem) {
                    $this->{$key}[$valueKey] = $valueItem;
                }
            }
            $this->{$key} = $value;
        }
    }

    private function initHTTP()
    {
        $this->http = new Client([
            'base_url' => $this->url,
            'timeout' => $this->timeout,
            'decode_content' => $this->decodeContent
        ]);
    }

    private function addAuthorizationTokenToHeader()
    {
        if ($this->authorization) {
            $this->headers['Authorization'] = "token " . $this->getAuthorizationKey();
        }
    }

    public function setAuthorizationKey($key)
    {
        $this->authorizationKey = $key;
    }

    public function getAuthorizationKey()
    {
        return $this->authorizationKey ? :config('githubapiz.access_token');
    }
}
