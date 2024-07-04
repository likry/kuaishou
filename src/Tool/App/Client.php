<?php

namespace Liukangkun\Kuaishou\Tool\App;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 创建应用.
     */
    public function create(array $params)
    {
        return $this->httpPostJson('v1/file/ad/app/create', $params);
    }

    /**
     * 获取应用列表.
     */
    public function get(array $params)
    {
        return $this->httpGetJson('v1/file/ad/app/list', $params);
    }

    /**
     * 更新应用.
     */
    public function update(array $params)
    {
        return $this->httpPostJson('v1/file/ad/app/update', $params);
    }

    /**
     * 获取应用定向.
     */
    public function search($appName)
    {
        $params = [
            'app_name' => $appName,
        ];

        return $this->httpGetJson('v1/tool/app/search', $params);
    }
}
