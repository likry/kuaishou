<?php

namespace Liukangkun\Kuaishou\Kernel;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Utils;
use Liukangkun\Kuaishou\Kernel\Exception\InvalidParamException;
use Liukangkun\Kuaishou\Kernel\Exception\KuaishouException;

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
     * @throws KuaishouException
     */
    public function httpRequest($url, $method = 'GET', array $options = [])
    {
        $validMethods = ['GET', 'POST', 'PUT', 'DELETE'];
        $method = strtoupper($method);
        if (!in_array($method, $validMethods, true)) {
            throw new InvalidParamException("Invalid HTTP method: {$method}");
        }
        $options = array_merge($this->defaults, $options);
        try {
            $response = $this->getHttpClient()->request($method, $url, $options);

            // 4. 优化响应处理
            $body = (string)$response->getBody();
        } catch (\Exception $e) {
            throw new KuaishouException("Failed to perform HTTP request to {$url}", 501);
        }
        return Utils::jsonDecode($body, true);
    }

    protected function getGuzzleHandler()
    {
        return Utils::chooseHandler();
    }
}
