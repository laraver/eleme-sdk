<?php

namespace Laraver\Eleme;

use Hanson\Foundation\Foundation;

/**
 * Class Eleme.
 *
 * @property \Laraver\Eleme\Core\AccessToken     $access_token
 * @property \Laraver\Eleme\Product\Product      $product
 * @property \Laraver\Eleme\Shop\Shop            $shop
 * @property \Laraver\Eleme\Message\Message      $message
 * @property \Laraver\Eleme\Packs\Packs          $packs
 * @property \Laraver\Eleme\Oauth\Oauth          $oauth
 * @property \Laraver\Eleme\User\User            $user
 * @property \Laraver\Eleme\Server\Server        $server
 */
class Eleme extends Foundation
{
    protected $providers = [
        ServiceProviders\AccessTokenServiceProvider::class,
        ServiceProviders\ProductServiceProvider::class,
        ServiceProviders\ShopServiceProvider::class,
        ServiceProviders\OrderServiceProvider::class,
        ServiceProviders\MessageServiceProvider::class,
        ServiceProviders\PacksServiceProvider::class,
        ServiceProviders\OauthServiceProvider::class,
        ServiceProviders\UserServiceProvider::class,
        ServiceProviders\ServerServiceProvider::class,
    ];
}
