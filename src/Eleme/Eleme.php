<?php

namespace Laraver\Waimai\Eleme;

use Laraver\Waimai\Eleme\Core\AccessToken;
use Laraver\Waimai\Foundation\Application;

/**
 * Class Eleme.
 *
 * @property \Laraver\Waimai\Eleme\Core\AccessToken     $access_token
 * @property \Laraver\Waimai\Eleme\Product\Product      $product
 * @property \Laraver\Waimai\Eleme\Shop\Shop            $shop
 * @property \Laraver\Waimai\Eleme\Message\Message      $message
 * @property \Laraver\Waimai\Eleme\Packs\Packs          $packs
 * @property \Laraver\Waimai\Eleme\Oauth\Oauth          $oauth
 * @property \Laraver\Waimai\Eleme\User\User            $user
 * @property \Laraver\Waimai\Eleme\Server\Server        $server
 */
class Eleme extends Application
{
    protected $providers = [
        ServiceProviders\ProductServiceProvider::class,
        ServiceProviders\ShopServiceProvider::class,
        ServiceProviders\OrderServiceProvider::class,
        ServiceProviders\MessageServiceProvider::class,
        ServiceProviders\PacksServiceProvider::class,
        ServiceProviders\OauthServiceProvider::class,
        ServiceProviders\UserServiceProvider::class,
        ServiceProviders\ServerServiceProvider::class,
    ];

    protected function getAccessToken($config)
    {
        return new AccessToken($config['app_id'], $config['secret'], array_get($config, 'debug', false));
    }
}
