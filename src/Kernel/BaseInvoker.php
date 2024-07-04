<?php

namespace Liukangkun\Kuaishou\Kernel;

use Liukangkun\Kuaishou\Kernel\Traits\HasSdkBaseInfo;
use Liukangkun\Kuaishou\Kernel\Exceptions\Exception;

class BaseInvoker
{
    use HasSdkBaseInfo;

    protected $instances = [];
    /**
     * @var array
     */
    protected $providers = [];

    public function __construct($advertiserId, $accessToken)
    {
        $this->setAdvertiserId($advertiserId);
        $this->setAccessToken($accessToken);
    }

    /**
     * @param $name
     *
     * @return mixed
     * @throws Exception
     *
     */
    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            if (array_key_exists($name, $this->instances)) {
                return $this->instances[$name];
            }
            if (property_exists($this, 'providers') && array_key_exists($name, $this->providers)) {
                $advertiserId = $this->getAdvertiserId();
                $accessToken = $this->getAccessToken();
                //实例化请求对象
                return new $this->providers[$name]($advertiserId, $accessToken);
            }

            throw new Exception("Undefined property $name", 500);
        }

        return $this->$name;
    }
}
