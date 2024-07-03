<?php

namespace Liukun\Kuaishou\Dmp;

use Liukun\Kuaishou\Kernel\BaseInvoker;

/**
 * Class Invoker.
 *
 * @property \Liukun\Kuaishou\Dmp\Population\Client $population
 */
class Invoker extends BaseInvoker
{
    protected $providers = [
        'population' => \Liukun\Kuaishou\Dmp\Population\Client::class,
    ];
}
