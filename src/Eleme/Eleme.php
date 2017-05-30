<?php

namespace Laraver\Waimai\Eleme;

use Laraver\Waimai\Eleme\Core\AccessToken;
use Laraver\Waimai\Foundation\Application;

/**
 * Class Eleme.
 *
 * @property AccessToken $access_token
 */
class Eleme extends Application
{
    protected $providers = [
//        AccessTokenProvider::class,
    ];

    protected function getAccessToken($config, $cache)
    {
        return new AccessToken($config, $cache);
    }
}
