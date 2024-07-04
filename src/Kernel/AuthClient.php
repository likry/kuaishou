<?php

namespace Liukangkun\Kuaishou\Kernel;

/**
 * Class Client.
 */
class AuthClient extends BaseRequest
{
    /**
     * @var string
     */
    protected $appId;

    /**
     * @var string
     */
    protected $secret;

    /**
     * Auth constructor.
     *
     * @param $appId
     * @param $secret
     */
    public function __construct($appId, $secret)
    {
        $this->setAppId($appId);
        $this->setSecret($secret);
    }

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param string $secret
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }

    /**
     * @param string $url
     * @param array $data
     * @param array $query
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpGetJson(string $url, array $data = [], array $query = [])
    {
        return $this->httpRequest($url, 'GET', ['query' => $query, 'json' => $data]);
    }

    /**
     * @param string $url
     * @param array $data
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpPost(string $url, array $data = [])
    {
        return $this->httpRequest($url, 'POST', ['form_params' => $data]);
    }

    /**
     * @param string $url
     * @param array $data
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpPostJson(string $url, array $data = [])
    {
        return $this->httpRequest($url, 'POST', ['json' => $data]);
    }

}
