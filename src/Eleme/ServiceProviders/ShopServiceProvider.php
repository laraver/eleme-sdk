<?php

namespace Laraver\Waimai\Eleme\ServiceProviders;

use Laraver\Waimai\Eleme\Shop\Shop;
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
            $product = new Shop($pimple['access_token']);

            return $product;
        };
    }
}
