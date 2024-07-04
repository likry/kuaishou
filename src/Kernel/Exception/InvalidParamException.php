<?php

namespace Liukangkun\Kuaishou\Kernel\Exception;

class InvalidParamException extends KuaishouException
{
    public function __construct($errorMessage, $errorCode = 500)
    {
        parent::__construct($errorMessage, $errorCode);
    }
}
