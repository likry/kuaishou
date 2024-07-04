<?php

namespace Liukangkun\Kuaishou\Advertising\Campaign;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 创建广告计划.
     */
    public function create(array $params)
    {
        return $this->httpPostJson('v2/campaign/create', $params);
    }

    /**
     * 获取广告计划列表.
     */
    public function get(array $params)
    {
        return $this->httpPostJson('v1/campaign/list', $params);
    }

    /**
     * 更新广告计划.
     */
    public function update(array $params)
    {
        return $this->httpPostJson('v2/campaign/update', $params);
    }

    /**
     * 更新广告计划状态
     * @param $campaignId
     * @param $status
     */
    public function updateStatus($campaignId, $status)
    {
        $params = [
            'campaign_id' => $campaignId,
            'put_status'  => $status,
        ];

        return $this->httpPostJson('v1/campaign/update/status', $params);
    }
}
