<?php

namespace Liukangkun\Kuaishou\Tool\CreativeWord;

use Liukangkun\Kuaishou\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取动态词包列表.
     */
    public function get()
    {
        return $this->httpGetJson('v1/tool/creative_word/list');
    }

    /**
     * 获取贴纸样式列表.
     */
    public function getStyles()
    {
        return $this->httpGetJson('v1/tool/creative_word/styles');
    }
}
