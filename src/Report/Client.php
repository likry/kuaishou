<?php

namespace Liukangkun\Kuaishou\Report;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 广告主数据（实时）
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAdvertiserReports(array $params)
    {
        return $this->httpPostJson('v1/report/account_report', $params);
    }

    /**
     * 广告计划数据（实时）
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCampaignReports(array $params)
    {
        return $this->httpPostJson('v1/report/campaign_report', $params);
    }

    /**
     * 广告组数据
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUnitReports(array $params)
    {
        return $this->httpPostJson('v1/report/unit_report', $params);
    }

    /**
     * 广告创意数据-自定义
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getCreativeReports(array $params)
    {
        return $this->httpPostJson('v1/report/creative_report', $params);
    }
}
