<?php

namespace Liukangkun\Kuaishou\Tool\File;

use Liukangkun\Kuaishou\Kernel\BaseClient;

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
        //上传到快手视频库
        return $this->uploadVideo(['blob_store_key' => $blob_store_key, 'signature' => md5_file($file)]);
    }

    public function chunkUploadVideo(string $file, string $file_type = 'mp4')
    {
        $token = $this->getUploadToken($file_type);
        if ($token['code']) {
            return $token;
        }
        $upload_token = $token['data']['upload_token'];
        $endpoint = $token['data']['endpoint'][0];
        //获取分片
        $chunk_list = $this->readFileContent($file);
        $chunk_res = [];
        foreach ($chunk_list as $key => $chunk) {
            $url = "https://{$endpoint}/api/upload/fragment?fragment_id={$key}&upload_token={$upload_token}";
            $chunk_res[] = $this->httpPost($url, [
                'binary_data' => $chunk,
            ]);
        }
        //获取上传总数
        $fragment_count = count($chunk_res);
        $merge_url = "https://{$endpoint}/api/upload/complete?fragment_count={$fragment_count}&upload_token={$upload_token}";
        $merge_res = $this->httpPostJson($merge_url, ['fragment_count' => $fragment_count]);
        if ($merge_res['result'] != 1) {
            //获取blob_store_key
            return $merge_res;
        }
        $verify_res = $this->uploadTokenVerify($upload_token);
        if ($verify_res['code']) {
            return $verify_res;
        }
        //获取blob_store_key
        $blob_store_key = $verify_res['data']['blob_store_key'];
        //上传到快手视频库
        return $this->uploadVideo(['blob_store_key' => $blob_store_key, 'signature' => md5_file($file)]);
    }

    //读取视频文件内容分片

    /**
     * 读取文件内容并分块返回
     *
     * 该私有方法用于按指定大小分块读取文件内容。这在处理大文件时特别有用，可以避免将整个文件内容一次性加载到内存中，从而减少内存使用。
     *
     * @param string $file 文件路径
     * @param int $chunk_size 每个分块的大小，默认为5MB
     * @return array 包含文件分块的数组
     */
    private function readFileContent(string $file, int $chunk_size = 1024 * 1024 * 5)
    {
        // 打开文件以进行读取
        $file_handle = fopen($file, 'r');

        // 初始化用于存储分块的数组
        $chunk_list = [];

        // 循环读取文件，直到到达文件末尾
        while (!feof($file_handle)) {
            // 将读取的分块添加到数组中
            $chunk_list[] = fread($file_handle, $chunk_size);
        }

        // 关闭文件句柄
        fclose($file_handle);

        // 返回包含文件分块的数组
        return $chunk_list;
    }


}
