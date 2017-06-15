<?php

namespace Laraver\Eleme\ServiceProviders;

use Laraver\Eleme\Product\Product;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ProductServiceProvider implements ServiceProviderInterface
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
        $pimple['product'] = function ($pimple) {
            $product = new Product($pimple['access_token']);

            return $product;
        };
    }
}
