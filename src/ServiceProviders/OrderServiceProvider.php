<?php

namespace Laraver\Eleme\ServiceProviders;

use Laraver\Eleme\Order\Order;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class OrderServiceProvider implements ServiceProviderInterface
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
        $pimple['order'] = function ($pimple) {
            $order = new Order($pimple['access_token']);

            return $order;
        };
    }
}
