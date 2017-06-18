<?php

namespace Laraver\Eleme\ServiceProviders;

use Laraver\Eleme\Packs\Packs;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PacksServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['packs'] = function ($pimple) {
            $packs = new Packs($pimple['access_token']);

            return $packs;
        };
    }
}
