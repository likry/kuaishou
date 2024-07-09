<?php

namespace Liukangkun\Kuaishou\Kernel\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Utils;
use Liukangkun\Kuaishou\Kernel\Exception\InvalidParamException;
use Liukangkun\Kuaishou\Kernel\Exception\KuaishouException;

/**
 * Class Client.
 */
class BaseRequest
{
    protected $baseUri = 'https://ad.e.kuaishou.com/rest/openapi/';

    /**
     * @param string $url
     * @param string $method
     * @param array $options
     * @return array|bool|float|int|object|string|null
     * @throws InvalidParamException
     * @throws KuaishouException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpRequest(string $url, string $method = 'GET', array $options = [])
    {
        $validMethods = ['GET', 'POST', 'PUT', 'DELETE'];
        $method = strtoupper($method);
        if (!in_array($method, $validMethods, true)) {
            throw new InvalidParamException("Invalid HTTP method: {$method}");
        }
        try {
            $config = [];
            if ("http" != substr($url, 0, 4)) {
                $config = [
                    'base_uri' => $this->baseUri
                ];
            }
            $response = (new Client($config))->request($method, $url, $options);
            $body = (string)$response->getBody();
        } catch (\Exception $e) {
            throw new KuaishouException("Failed to perform HTTP request to {$url}", 501);
        }
        return Utils::jsonDecode($body, true);
    }
}
