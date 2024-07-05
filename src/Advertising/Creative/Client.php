<?php

namespace Liukangkun\Kuaishou\Advertising\Creative;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 创建程序化创意.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $params)
    {
        return $this->httpPostJson('gw/dsp/advanced_creative/create', $params);
    }

    /**
     * 查询程序化创意.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(array $params)
    {
        return $this->httpPostJson('gw/dsp/advanced_creative/list', $params);
    }

    /**
     * 修改程序化创意.
     * @param array $params
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(array $params)
    {
        return $this->httpPostJson('gw/dsp/advanced_creative/update', $params);
    }

    /**
     * 修改创意状态
     * @param $creativeId
     * @param $status
     * @return array|bool|float|int|object|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function updateStatus($creativeId, $status)
    {
        $params = [
            'creative_id' => $creativeId,
            'put_status'  => $status,
        ];

        return $this->httpPostJson('v1/creative/update/status', $params);
    }
}
