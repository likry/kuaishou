<?php

namespace Liukangkun\Kuaishou\Kernel;

use Liukangkun\Kuaishou\Kernel\Traits\HasSdkBaseInfo;

/**
 * Class Client.
 */
class BaseClient extends BaseRequest
{
    use HasSdkBaseInfo;

    /**
     * Client constructor.
     *
     * @param string $advertiserId
     * @param string $accessToken
     */
    public function __construct(string $advertiserId, string $accessToken)
    {
        $this->setAdvertiserId($advertiserId);
        $this->setAccessToken($accessToken);
    }

    /**
     * @param string $url
     * @param array $data
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpGetJson(string $url, array $data = [])
    {
        $data['advertiser_id'] = $this->getAdvertiserId();
        return $this->httpRequest($url, 'GET', ['json' => $data, 'headers' => [
            'Access-Token' => $this->getAccessToken()
        ]]);
    }

    public function httpPost(string $url, array $data = [])
    {
        $multipart [] = [
            'name' => 'advertiser_id',
            'contents' => $this->getAdvertiserId()
        ];
        foreach ($data as $key => $value) {
            $multipart[] = [
                'name' => $key,
                'contents' => $value
            ];
        }
        return $this->httpRequest($url, 'POST', ['multipart' => $multipart, 'headers' => [
            'Access-Token' => $this->getAccessToken()
        ]]);
    }

    /**
     * @param string $url
     * @param array $data
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpPostBak(string $url, array $data = [])
    {
        $multipart [] = [
            'name' => 'advertiser_id',
            'contents' => $this->getAdvertiserId()
        ];
        foreach ($data as $key => $value) {
            $multipart[] = [
                'name' => $key,
                'contents' => $value
            ];
        }
        return $this->httpRequest($url, 'POST', ['multipart' => $multipart, 'headers' => [
            'Access-Token' => $this->getAccessToken()
        ]]);
    }

    /**
     * @param $url
     * @param array $data
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpPostJson($url, array $data = [])
    {
        $data['advertiser_id'] = $this->getAdvertiserId();
        return $this->httpRequest($url, 'POST', ['json' => $data, 'headers' => [
            'Access-Token' => $this->getAccessToken()
        ]]);
    }

}
