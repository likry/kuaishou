<?php

namespace Liukangkun\Kuaishou\Dmp\Population;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 上传人群包.
     */
    public function upload(array $params)
    {
        return $this->httpPostJson('v1/dmp/population/upload', $params);
    }

    /**
     * 获取人群包列表.
     */
    public function get(array $params)
    {
        return $this->httpPostJson('v1/dmp/population/list', $params);
    }

    /**
     * 删除人群包.
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
     */
    public function push($id)
    {
        $params = [
            'orientation_id' => $id,
        ];

        return $this->httpPostJson('v1/dmp/population/push', $params);
    }
}
