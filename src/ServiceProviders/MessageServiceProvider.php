<?php

namespace Laraver\Eleme\ServiceProviders;

use Laraver\Eleme\Message\Message;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class MessageServiceProvider implements ServiceProviderInterface
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
        $pimple['message'] = function ($pimple) {
            $message = new Message($pimple['access_token']);

            return $message;
        };
    }
}
