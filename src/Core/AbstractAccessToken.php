<?php

namespace Laraver\Waimai\Core;

use Doctrine\Common\Cache\Cache;

abstract class AbstractAccessToken
{
    public $appId;

    public $secret;

    public $url;

    public $token;

    /**
     * Cache key.
     *
     * @var string
     */
    protected $cacheKey;

    /**
     * Cache.
     *
     * @var Cache
     */
    protected $cache;

    public function getCacheKey()
    {
        if (is_null($this->cacheKey)) {
            return $this->getPrefix().$this->appId;
        }

        return $this->cacheKey;
    }

    abstract public function getToken($force = false);

    abstract public function signature($protocol);

    abstract public function getPrefix();
}
