<?php

namespace Liukangkun\Kuaishou\Kernel;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Utils;
use Liukangkun\Kuaishou\Kernel\Exceptions\ApiException;

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
        // 获取响应体的内容作为字符串
        $body = $response->getBody();
        $result = Utils::jsonDecode($body, true);
        // 将JSON字符串转换为PHP数组
        if (!isset($result['code']) || $result['code'] != 0) {
            $message = isset($result['message']) ? $result['message'] : '';
            $code = isset($result['code']) ? $result['code'] : 0;
            throw new ApiException($message, $response, $result, $code);
        }
        return $result;
    }

    protected function getGuzzleHandler()
    {
        return Utils::chooseHandler();
    }
}
