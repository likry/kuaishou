<?php

namespace Liukun\Kuaishou\Tool;

use Liukun\Kuaishou\Kernel\BaseInvoker;

/**
 * Class Invoker.
 *
 * @property \Liukun\Kuaishou\Tool\App\Client          $app
 * @property \Liukun\Kuaishou\Tool\CreativeWord\Client $creativeWord
 * @property \Liukun\Kuaishou\Tool\File\Client         $file
 * @property \Liukun\Kuaishou\Tool\InterestTag\Client  $interestTag
 * @property \Liukun\Kuaishou\Tool\LandingPage\Client  $landingPage
 * @property \Liukun\Kuaishou\Tool\Region\Client       $region
 */
class Invoker extends BaseInvoker
{
    protected $providers = [
        'app'          => \Liukun\Kuaishou\Tool\App\Client::class,
        'creativeWord' => \Liukun\Kuaishou\Tool\CreativeWord\Client::class,
        'file'         => \Liukun\Kuaishou\Tool\File\Client::class,
        'interestTag'  => \Liukun\Kuaishou\Tool\InterestTag\Client::class,
        'landingPage'  => \Liukun\Kuaishou\Tool\LandingPage\Client::class,
        'region'       => \Liukun\Kuaishou\Tool\Region\Client::class,
    ];
}
