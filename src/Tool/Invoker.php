<?php

namespace Liukangkun\Kuaishou\Tool;

use Liukangkun\Kuaishou\Kernel\BaseInvoker;

/**
 * Class Invoker.
 *
 * @property \Liukangkun\Kuaishou\Tool\File\Client         $file
 */
class Invoker extends BaseInvoker
{
    protected $providers = [
        'file'         => \Liukangkun\Kuaishou\Tool\File\Client::class,
    ];
}
