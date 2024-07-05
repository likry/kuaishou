<?php

namespace Liukangkun\Kuaishou\Advertising\Campaign;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 创建广告计划.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $params)
    {
        return $this->httpPostJson('gw/dsp/campaign/create', $params);
    }

    /**
     * 获取广告计划信息.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(array $params)
    {
        return $this->httpPostJson('gw/dsp/campaign/list', $params);
    }

    /**
     * 修改广告计划.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(array $params)
    {
        return $this->httpPostJson('gw/dsp/campaign/update', $params);
    }

    /**
     * 修改广告计划状态
     * @param $campaignId
     * @param $status
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
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
