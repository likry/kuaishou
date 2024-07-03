<?php

namespace Liukun\Kuaishou;

use Liukun\Kuaishou\Kernel\BaseInvoker;

/**
 * Class Client.
 *
 * @property \Liukun\Kuaishou\Advertiser\Client           $advertiser
 * @property \Liukun\Kuaishou\Advertising\Campaign\Client $campaign
 * @property \Liukun\Kuaishou\Advertising\Unit\Client     $unit
 * @property \Liukun\Kuaishou\Advertising\Creative\Client $creative
 * @property \Liukun\Kuaishou\Report\Client               $report
 * @property \Liukun\Kuaishou\Tool\Invoker                $tool
 * @property \Liukun\Kuaishou\Dmp\Invoker                 $dmp
 */
class Client extends BaseInvoker
{
    protected $providers = [
        'advertiser' => \Liukun\Kuaishou\Advertiser\Client::class,
        'campaign'   => \Liukun\Kuaishou\Advertising\Campaign\Client::class,
        'unit'       => \Liukun\Kuaishou\Advertising\Unit\Client::class,
        'creative'   => \Liukun\Kuaishou\Advertising\Creative\Client::class,
        'report'     => \Liukun\Kuaishou\Report\Client::class,
        'tool'       => \Liukun\Kuaishou\Tool\Invoker::class,
        'dmp'        => \Liukun\Kuaishou\Dmp\Invoker::class,
    ];
}
