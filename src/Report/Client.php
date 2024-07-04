<?php

namespace Liukangkun\Kuaishou\Report;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取广告主报表.
     */
    public function getAdvertiserReports(array $params)
    {
        return $this->httpPostJson('v1/report/account_report', $params);
    }

    /**
     * 获取广告计划报表.
     */
    public function getCampaignReports(array $params)
    {
        return $this->httpPostJson('v1/report/campaign_report', $params);
    }

    /**
     * 获取广告组报表.
     */
    public function getUnitReports(array $params)
    {
        return $this->httpPostJson('v1/report/unit_report', $params);
    }

    /**
     * 获取广告创意报表.
     */
    public function getCreativeReports(array $params)
    {
        return $this->httpPostJson('v1/report/creative_report', $params);
    }
}
