<?php

namespace Liukun\Kuaishou\Report;

use Liukun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取广告主报表.
     * @param array $params
     *
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getAdvertiserReports(array $params)
    {
        return $this->httpPostJson('v1/report/account_report', $params);
    }

    /**
     * 获取广告计划报表.
     * @param array $params
     *
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getCampaignReports(array $params)
    {
        return $this->httpPostJson('v1/report/campaign_report', $params);
    }

    /**
     * 获取广告组报表.
     * @param array $params
     *
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getUnitReports(array $params)
    {
        return $this->httpPostJson('v1/report/unit_report', $params);
    }

    /**
     * 获取广告创意报表.
     * @param array $params
     *
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getCreativeReports(array $params)
    {
        return $this->httpPostJson('v1/report/creative_report', $params);
    }
}
