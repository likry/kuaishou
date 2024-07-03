<?php

namespace Liukangkun\Kuaishou;

use Liukangkun\Kuaishou\Kernel\BaseInvoker;

/**
 * Class Client.
 *
 * @property \Liukangkun\Kuaishou\Advertiser\Client           $advertiser
 * @property \Liukangkun\Kuaishou\Advertising\Campaign\Client $campaign
 * @property \Liukangkun\Kuaishou\Advertising\Unit\Client     $unit
 * @property \Liukangkun\Kuaishou\Advertising\Creative\Client $creative
 * @property \Liukangkun\Kuaishou\Report\Client               $report
 * @property \Liukangkun\Kuaishou\Tool\Invoker                $tool
 * @property \Liukangkun\Kuaishou\Dmp\Invoker                 $dmp
 */
class Client extends BaseInvoker
{
    protected $providers = [
        'advertiser' => \Liukangkun\Kuaishou\Advertiser\Client::class,
        'campaign'   => \Liukangkun\Kuaishou\Advertising\Campaign\Client::class,
        'unit'       => \Liukangkun\Kuaishou\Advertising\Unit\Client::class,
        'creative'   => \Liukangkun\Kuaishou\Advertising\Creative\Client::class,
        'report'     => \Liukangkun\Kuaishou\Report\Client::class,
        'tool'       => \Liukangkun\Kuaishou\Tool\Invoker::class,
        'dmp'        => \Liukangkun\Kuaishou\Dmp\Invoker::class,
    ];
}
