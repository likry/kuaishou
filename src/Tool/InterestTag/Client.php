<?php

namespace Liukangkun\Kuaishou\Tool\InterestTag;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取定向标签列表.
     * @param $type
     *
     * @return array|\Liukangkun\Kuaishou\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *@throws \Liukangkun\Kuaishou\Kernel\Exceptions\InvalidArgumentException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @throws \Liukangkun\Kuaishou\Kernel\Exceptions\ApiException
     */
    public function get($type)
    {
        $params = [
            'type' => $type,
        ];

        return $this->httpGetJson('v1/tool/targeting_tags/list', $params);
    }
}
