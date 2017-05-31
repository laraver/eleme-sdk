<?php

namespace Laraver\Waimai\Eleme;

use Laraver\Waimai\Eleme\Core\AccessToken;
use Laraver\Waimai\Foundation\Application;

/**
 * Class Eleme.
 *
 * @property Laraver\Waimai\Eleme\Core\AccessToken     $access_token
 * @property Laraver\Waimai\Eleme\Product\Product      $product
 * @property Laraver\Waimai\Eleme\Shop\Shop            $shop
 * @property Laraver\Waimai\Eleme\Message\Message      $message
 * @property Laraver\Waimai\Eleme\Packs\Packs          $packs
 */
class Eleme extends Application
{
    protected $providers = [
        ServiceProviders\ProductServiceProvider::class,
        ServiceProviders\ShopServiceProvider::class,
        ServiceProviders\OrderServiceProvider::class,
        ServiceProviders\MessageServiceProvider::class,
        ServiceProviders\PacksServiceProvider::class,
    ];

    protected function getAccessToken($config, $cache)
    {
        return new AccessToken($config, $cache);
    }
}
