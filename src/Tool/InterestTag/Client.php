<?php

namespace Liukangkun\Kuaishou\Tool\InterestTag;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取定向标签列表.
     */
    public function get($type)
    {
        $params = [
            'type' => $type,
        ];

        return $this->httpGetJson('v1/tool/targeting_tags/list', $params);
    }
}
