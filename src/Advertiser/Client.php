<?php

namespace Liukangkun\Kuaishou\Advertiser;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取广告账户信息.
     * @return array|\Liukangkun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukangkun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukangkun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getInfo()
    {
        return $this->httpGetJson('v1/advertiser/info');
    }

    /**
     * 获取广告账户余额信息.
     * @return array|\Liukangkun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukangkun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukangkun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getFunds()
    {
        return $this->httpGetJson('v1/advertiser/fund/get');
    }

    /**
     * 获取广告账户流水信息.
     * @param array $params
     *
     * @return array|\Liukangkun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukangkun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukangkun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getFlows(array $params)
    {
        return $this->httpGetJson('v1/advertiser/fund/daily_flows', $params);
    }

    /**
     * 获取广告账户日预算.
     * @return array|\Liukangkun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \Liukangkun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukangkun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getBudget()
    {
        return $this->httpGetJson('v1/advertiser/budget/get');
    }
}
