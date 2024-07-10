<?php

namespace Liukangkun\Kuaishou\Tool\File;

use Liukangkun\Kuaishou\Kernel\BaseClient;
use GuzzleHttp\Promise;

class Client extends BaseClient
{
    /**
     * 上传视频.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     */
    public function uploadVideo(array $params)
    {
        return $this->httpPost('v2/file/ad/video/upload', $params);
    }

    /**
     * 获取视频列表.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getVideos(array $params)
    {
        return $this->httpPostJson('v1/file/ad/video/list', $params);
    }

    /**
     * 上传图片.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     */
    public function uploadImage(array $params)
    {
        return $this->httpPost('v2/file/ad/image/upload', $params);
    }

    /**
     * 获取图片信息.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getImage(array $params)
    {
        return $this->httpGetJson('v1/file/ad/image/get', $params);
    }

    /**
     * 获取图片列表.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getImages(array $params)
    {
        return $this->httpGetJson('v1/file/ad/image/list', $params);
    }


    /**
     * 获取上传token及上传域名
     * @param string $file_type 文件类型，视频文件传 "mp4"
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUploadToken(string $file_type)
    {
        return $this->httpPostJson('gw/ad/common/upload/token/generate', [
            'file_type' => $file_type
        ]);
    }

    /**
     * 领用上传token换取blob_store_key
     * @param string $upload_token
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function uploadTokenVerify(string $upload_token)
    {
        return $this->httpPostJson('gw/ad/common/upload/token/verify', [
            'upload_token' => $upload_token
        ]);
    }

    /**
     * 文件流方式上传
     * @param string $file 本地文件路径
     * @param string $file_type
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Liukangkun\Kuaishou\Kernel\Exception\InvalidParamException
     * @throws \Liukangkun\Kuaishou\Kernel\Exception\KuaishouException
     */
    public function streamUploadVideo(string $file, string $file_type = 'mp4')
    {
        $token = $this->getUploadToken($file_type);
        if ($token['code']) {
            return $token;
        }
        $upload_token = $token['data']['upload_token'];
        $endpoint = $token['data']['endpoint'][0];
        $url = "https://{$endpoint}/api/upload/multipart?upload_token={$upload_token}";
        $up_res = $this->httpPost($url, ['file' => $file]);
        if ($up_res['result'] != 1) {
            //获取blob_store_key
            return $up_res;
        }
        $verify_res = $this->uploadTokenVerify($upload_token);
        if ($verify_res['code']) {
            return $verify_res;
        }
        //获取blob_store_key
        $blob_store_key = $verify_res['data']['blob_store_key'];
        $file_name = pathinfo($file, PATHINFO_FILENAME);
        //上传到快手视频库
        return $this->uploadVideo(['blob_store_key' => $blob_store_key, 'photo_name' => $file_name, 'signature' => md5_file($file)]);
    }

    /**
     * 分片上传视频
     * @param string $file
     * @param string $file_type
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function chunkUploadVideo(string $file, string $file_type = 'mp4')
    {
        //检测文件后缀是否为mp4
        if (pathinfo($file, PATHINFO_EXTENSION) != 'mp4') {
            return ['code' => 1001, 'message' => '只允许上传mp4格式的视频'];
        }
        $token = $this->getUploadToken($file_type);
        if ($token['code']) {
            return $token;
        }
        $upload_token = $token['data']['upload_token'];
        $endpoint = $token['data']['endpoint'][0];
        //分片上传
        $fragment_count = $this->chunkUpload($file, $endpoint, $upload_token);
        //合成分片
        $merge_res = $this->finishChunkUpload($fragment_count, $endpoint, $upload_token);
        if ($merge_res['result'] != 1) {
            //获取blob_store_key
            return $merge_res;
        }
        //验证token
        $verify_res = $this->uploadTokenVerify($upload_token);
        if ($verify_res['code']) {
            return $verify_res;
        }
        //获取blob_store_key
        $blob_store_key = $verify_res['data']['blob_store_key'];
        //获取文件名称和文件后缀
        $file_name = pathinfo($file, PATHINFO_FILENAME);
        //上传到快手视频库
        return $this->uploadVideo(['blob_store_key' => $blob_store_key, 'photo_name' => $file_name, 'signature' => md5_file($file)]);
    }

    private function chunkUpload($file, $endpoint, $upload_token, $chunk_size = 1024 * 1024 * 5)
    {
        //检测文件后缀
        //$size = filesize($file);
        $f = fopen($file, 'rb');
        $promises = [];
        $i = 0;
        while (!feof($f)) {
            $start = $i * $chunk_size;
            fseek($f, $start);
            $buffer = fread($f, $chunk_size);
            $promises[] = $this->fragmentUpload($buffer, $i, $endpoint, $upload_token);
            $i++;
        }
        fclose($f);
        Promise\Utils::unwrap($promises);
        return $i;
    }

    //上传分片
    private function fragmentUpload($buffer, $fragment_id, $endpoint, $upload_token)
    {
        $url = "https://{$endpoint}/api/upload/fragment?fragment_id={$fragment_id}&upload_token={$upload_token}";
        return $this->getHttpClient()->requestAsync('POST', $url, [
            'headers' => [
                'Content-Type' => 'video/mp4',
            ],
            'body' => $buffer,
        ]);
    }

    private function finishChunkUpload($fragment_count, $endpoint, $upload_token)
    {
        $url = "https://{$endpoint}/api/upload/complete?fragment_count={$fragment_count}&upload_token={$upload_token}";
        return $this->httpPostJson($url, ['fragment_count' => $fragment_count]);
    }
}
