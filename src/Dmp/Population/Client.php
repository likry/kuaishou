<?php

namespace Liukun\Kuaishou\Dmp\Population;

use Liukun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 上传人群包.
     * @param array $params
     *
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function upload(array $params)
    {
        return $this->httpPostJson('v1/dmp/population/upload', $params);
    }

    /**
     * 获取人群包列表.
     * @param array $params
     *
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function get(array $params)
    {
        return $this->httpPostJson('v1/dmp/population/list', $params);
    }

    /**
     * 删除人群包.
     * @param $id
     *
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function delete($id)
    {
        $params = [
            'orientation_id' => $id,
        ];

        return $this->httpPostJson('v1/dmp/population/delete', $params);
    }

    /**
     * 推送人群包.
     * @param $id
     *
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function push($id)
    {
        $params = [
            'orientation_id' => $id,
        ];

        return $this->httpPostJson('v1/dmp/population/push', $params);
    }
}
