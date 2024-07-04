<?php

namespace Liukangkun\Kuaishou\Advertising\Unit;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 创建广告组.
     */
    public function create(array $params)
    {
        return $this->httpPostJson('v2/ad_unit/create', $params);
    }

    /**
     * 获取广告组列表.
     */
    public function get(array $params)
    {
        return $this->httpPostJson('v1/ad_unit/list', $params);
    }

    /**
     * 更新广告组.
     */
    public function update(array $params)
    {
        return $this->httpPostJson('v2/ad_unit/update', $params);
    }

    /**
     * 更新广告组出价.
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
     * 更新广告组预算.
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
     * 更新广告组状态
     */
    public function updateStatus($unitId, $status)
    {
        $params = [
            'unit_id' => $unitId,
            'put_status' => $status,
        ];

        return $this->httpPostJson('v1/ad_unit/update/status', $params);
    }

    /**
     * 获取深度转化类型.
     */
    public function getConversionInfo()
    {
        return $this->httpGetJson('v1/ad_unit/ocpc/conversion_infos');
    }
}
