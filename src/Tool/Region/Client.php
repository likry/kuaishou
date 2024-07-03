<?php

namespace Liukun\Kuaishou\Tool\Region;

use Liukun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取地域信息.
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function get()
    {
        return $this->httpGetJson('v1/region/list');
    }
}
