<?php

namespace Liukangkun\Kuaishou\Dmp;

use Liukangkun\Kuaishou\Kernel\BaseInvoker;

/**
 * Class Invoker.
 *
 * @property \Liukangkun\Kuaishou\Dmp\Population\Client $population
 */
class Invoker extends BaseInvoker
{
    protected $providers = [
        'population' => \Liukangkun\Kuaishou\Dmp\Population\Client::class,
    ];
}
