<?php

namespace Liukangkun\Kuaishou\Tool\File;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 上传视频.
     * @param array $params
     *
     * @return array|\Liukangkun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukangkun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukangkun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function uploadVideo(array $params)
    {
        return $this->httpPost('v2/file/ad/video/upload', $params);
    }

    /**
     * 获取视频列表.
     * @param array $params
     *
     * @return array|\Liukangkun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukangkun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukangkun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getVideos(array $params)
    {
        return $this->httpPostJson('v1/file/ad/video/list', $params);
    }

    /**
     * 上传图片.
     * @param array $params
     *
     * @return array|\Liukangkun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukangkun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukangkun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function uploadImage(array $params)
    {
        return $this->httpPost('v2/file/ad/image/upload', $params);
    }

    /**
     * 获取图片信息.
     * @param array $params
     *
     * @return array|\Liukangkun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \Liukangkun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukangkun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getImage(array $params)
    {
        return $this->httpGetJson('v1/file/ad/image/get', $params);
    }

    /**
     * 获取图片列表.
     * @param array $params
     *
     * @return array|\Liukangkun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \Liukangkun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukangkun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getImages(array $params)
    {
        return $this->httpGetJson('v1/file/ad/image/list', $params);
    }
}