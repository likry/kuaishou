<?php

namespace Liukun\Kuaishou\Tool\InterestTag;

use Liukun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取定向标签列表.
     * @param $type
     *
     * @return array|\Liukun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function get($type)
    {
        $params = [
            'type' => $type,
        ];

        return $this->httpGetJson('v1/tool/targeting_tags/list', $params);
    }
}
