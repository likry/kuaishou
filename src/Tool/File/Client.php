<?php

namespace Liukangkun\Kuaishou\Tool\File;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 上传视频.
     */
    public function uploadVideo(array $params)
    {
        return $this->httpPost('v2/file/ad/video/upload', $params);
    }

    /**
     * 获取视频列表.
     */
    public function getVideos(array $params)
    {
        return $this->httpPostJson('v1/file/ad/video/list', $params);
    }

    /**
     * 上传图片.
     */
    public function uploadImage(array $params)
    {
        return $this->httpPost('v2/file/ad/image/upload', $params);
    }

    /**
     * 获取图片信息.
     */
    public function getImage(array $params)
    {
        return $this->httpGetJson('v1/file/ad/image/get', $params);
    }

    /**
     * 获取图片列表.
     */
    public function getImages(array $params)
    {
        return $this->httpGetJson('v1/file/ad/image/list', $params);
    }
}
