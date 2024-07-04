<?php

namespace Liukangkun\Kuaishou\Tool\Region;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取地域信息.
     */
    public function get()
    {
        return $this->httpGetJson('v1/region/list');
    }
}
