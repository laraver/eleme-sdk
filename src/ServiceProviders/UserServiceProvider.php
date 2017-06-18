<?php

namespace Laraver\Eleme\ServiceProviders;

use Laraver\Eleme\User\User;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class UserServiceProvider implements ServiceProviderInterface
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
        $pimple['user'] = function ($pimple) {
            $user = new User($pimple['access_token']);

            return $user;
        };
    }
}
