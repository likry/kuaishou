<?php

namespace Liukangkun\Kuaishou\Tool;

use Liukangkun\Kuaishou\Kernel\BaseInvoker;

/**
 * Class Invoker.
 *
 * @property \Liukangkun\Kuaishou\Tool\App\Client          $app
 * @property \Liukangkun\Kuaishou\Tool\CreativeWord\Client $creativeWord
 * @property \Liukangkun\Kuaishou\Tool\File\Client         $file
 * @property \Liukangkun\Kuaishou\Tool\InterestTag\Client  $interestTag
 * @property \Liukangkun\Kuaishou\Tool\LandingPage\Client  $landingPage
 * @property \Liukangkun\Kuaishou\Tool\Region\Client       $region
 */
class Invoker extends BaseInvoker
{
    protected $providers = [
        'app'          => \Liukangkun\Kuaishou\Tool\App\Client::class,
        'creativeWord' => \Liukangkun\Kuaishou\Tool\CreativeWord\Client::class,
        'file'         => \Liukangkun\Kuaishou\Tool\File\Client::class,
        'interestTag'  => \Liukangkun\Kuaishou\Tool\InterestTag\Client::class,
        'landingPage'  => \Liukangkun\Kuaishou\Tool\LandingPage\Client::class,
        'region'       => \Liukangkun\Kuaishou\Tool\Region\Client::class,
    ];
}
