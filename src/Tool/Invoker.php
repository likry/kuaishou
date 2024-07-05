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
        'file'         => \Liukangkun\Kuaishou\Tool\File\Client::class,
    ];
}
