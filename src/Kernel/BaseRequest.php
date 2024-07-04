<?php

namespace Liukangkun\Kuaishou\Kernel;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Utils;

/**
 * Class Client.
 */
class BaseRequest
{
    protected $httpClient;
    protected $baseUri = 'https://ad.e.kuaishou.com/rest/openapi/';
    protected $defaults = [
        'curl' => [
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
        ],
    ];

    public function getHttpClient()
    {
        if (!$this->httpClient) {
            $this->httpClient = new Client([
                'base_uri' => $this->baseUri,
                'handler' => HandlerStack::create($this->getGuzzleHandler())
            ]);
        }
        return $this->httpClient;
    }

    /**
     * @param $url
     * @param $method
     * @param array $options
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpRequest($url, $method = 'GET', array $options = [])
    {
        $method = strtoupper($method);
        $options = array_merge($this->defaults, $options);
        $response = $this->getHttpClient()->request($method, $url, $options);
        $response->getBody()->rewind();
        $body = $response->getBody();
        return Utils::jsonDecode($body, true);
    }

    protected function getGuzzleHandler()
    {
        return Utils::chooseHandler();
    }
}
