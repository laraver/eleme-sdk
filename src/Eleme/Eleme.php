<?php

namespace Laraver\Waimai\Eleme;

use Laraver\Waimai\Eleme\Core\AccessToken;
use Laraver\Waimai\Foundation\Application;

/**
 * Class Eleme.
 *
 * @property AccessToken $access_token
 * @property Product $product
 * @property Shop $shop
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
