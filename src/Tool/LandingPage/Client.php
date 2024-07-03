<?php

namespace Liukun\Kuaishou\Tool\LandingPage;

use Liukun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取落地页列表.
     * @param array $params
     *
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getPages(array $params)
    {
        return $this->httpPostJson('v1/lp/page/list', $params);
    }

    /**
     * 获取组件列表.
     * @param array $params
     *
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getComponents(array $params)
    {
        return $this->httpPostJson('v1/lp/component/list', $params);
    }

    /**
     * 获取线索列表.
     * @param array $params
     *
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function getLeads(array $params)
    {
        return $this->httpPostJson('v1/lp/lead/list', $params);
    }

    /**
     * 更新线索.
     * @param array $params
     *
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function updateLeads(array $params)
    {
        return $this->httpPostJson('v1/lp/lead/mod', $params);
    }
}
