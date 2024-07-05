<?php

namespace Liukangkun\Kuaishou\Advertising\Unit;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 创建广告组.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $params)
    {
        return $this->httpPostJson('gw/dsp/unit/create', $params);
    }

    /**
     * 查询广告组.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(array $params)
    {
        return $this->httpPostJson('gw/dsp/unit/list', $params);
    }

    /**
     * 修改广告组.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(array $params)
    {
        return $this->httpPostJson('gw/dsp/unit/update', $params);
    }

    /**
     * 修改广告组出价.
     * @param $unitId
     * @param $bid
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateBid($unitId, $bid)
    {
        $params = [
            'unit_id' => $unitId,
            'bid' => $bid,
        ];

        return $this->httpPostJson('v1/ad_unit/update/bid', $params);
    }

    /**
     * 修改广告组预算.
     * @param $unitId
     * @param $budget
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateBudget($unitId, $budget)
    {
        $params = [
            'unit_id' => $unitId,
            'day_budget' => $budget,
        ];

        return $this->httpPostJson('v1/ad_unit/update/day_budget', $params);
    }

    /**
     * 修改广告组状态
     * @param $unitId
     * @param $status
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateStatus($unitId, $status)
    {
        $params = [
            'unit_id' => $unitId,
            'put_status' => $status,
        ];

        return $this->httpPostJson('v1/ad_unit/update/status', $params);
    }
}
