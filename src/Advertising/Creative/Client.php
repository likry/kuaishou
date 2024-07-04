<?php

namespace Liukangkun\Kuaishou\Advertising\Creative;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 创建广告创意.
     */
    public function create(array $params)
    {
        return $this->httpPostJson('v2/creative/create', $params);
    }

    /**
     * 获取广告创意列表.
     */
    public function get(array $params)
    {
        return $this->httpPostJson('v1/creative/list', $params);
    }

    /**
     * 更新广告创意.
     */
    public function update(array $params)
    {
        return $this->httpPostJson('v2/creative/update', $params);
    }

    /**
     * 更新广告创意状态
     */
    public function updateStatus($creativeId, $status)
    {
        $params = [
            'creative_id' => $creativeId,
            'put_status'  => $status,
        ];

        return $this->httpPostJson('v1/creative/update/status', $params);
    }
}
