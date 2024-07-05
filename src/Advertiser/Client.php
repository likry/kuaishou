<?php

/**
 * 广告主客户端类。
 * 该类继承自BaseClient，用于实现与快手广告主相关接口的调用。
 */

namespace Liukangkun\Kuaishou\Advertiser;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取广告账户信息。
     * 通过调用该方法，可以获取广告主的账户基本信息。
     *
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getInfo()
    {
        return $this->httpGetJson('v1/advertiser/info');
    }

    /**
     * 获取广告账户余额信息。
     * 该方法用于查询广告主账户的当前余额情况。
     *
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFunds()
    {
        return $this->httpGetJson('v1/advertiser/fund/get');
    }

    /**
     * 获取广告账户流水信息。
     * 通过传入参数，可以查询广告主账户的流水信息。
     *
     * @param array $params 查询参数，具体参见接口文档。
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getFlows(array $params)
    {
        return $this->httpGetJson('v1/advertiser/fund/daily_flows', $params);
    }

    /**
     * 账户日预算查询。
     * 该方法用于查询广告主账户的日预算设置。
     *
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBudget()
    {
        return $this->httpGetJson('v1/advertiser/budget/get');
    }
}