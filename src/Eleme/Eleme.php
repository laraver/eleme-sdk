<?php

namespace Laraver\Waimai\Eleme;

use Laraver\Waimai\Eleme\Core\AccessToken;
use Laraver\Waimai\Eleme\Product\Product;
use Laraver\Waimai\Eleme\ServiceProviders\ProductServiceProvider;
use Laraver\Waimai\Foundation\Application;

/**
 * Class Eleme.
 *
 * @property AccessToken $access_token
 * @property Product $product
 */
class Eleme extends Application
{
    protected $providers = [
        ProductServiceProvider::class,
    ];

    protected function getAccessToken($config, $cache)
    {
        return new AccessToken($config, $cache);
    }
}
