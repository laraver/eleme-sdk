<?php

namespace Laraver\Eleme\ServiceProviders;

use Laraver\Eleme\Shop\Shop;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ShopServiceProvider implements ServiceProviderInterface
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
        $pimple['shop'] = function ($pimple) {
            $shop = new Shop($pimple['access_token']);

            return $shop;
        };
    }
}
