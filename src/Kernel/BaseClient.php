<?php

namespace Liukangkun\Kuaishou\Kernel;

use GuzzleHttp\Psr7\Utils as PsUtils;
use GuzzleHttp\Utils;
use Liukangkun\Kuaishou\Kernel\Http\BaseRequest;
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

    /**
     * @param string $url
     * @param array $data [['name' => 'foo','contents' => 'data','headers'  => ['X-Baz' => 'bar']]
     * @return array|bool|float|int|object|string|null
     * @throws Exception\InvalidParamException
     * @throws Exception\KuaishouException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpPost(string $url, array $data = [])
    {
        $multipart [] = [
            'name' => 'advertiser_id',
            'contents' => $this->getAdvertiserId()
        ];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                // 如果字段是数组，将其转换为多个键值对
                foreach ($value as $item) {
                    $multipart[] = [
                        'name' => $key,
                        'contents' => is_string($item) ? $item : Utils::JsonEncode($item),
                    ];
                }
            } elseif (is_string($value) && file_exists($value)) {
                // 如果字段是文件路径，准备文件上传
                $multipart[] = [
                    'name' => $key,
                    'contents' => PsUtils::tryFopen($value, 'r'),
                ];
            } else {
                // 如果字段不是数组或文件，直接添加
                $multipart[] = [
                    'name' => $key,
                    'contents' => $value,
                ];
            }
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
