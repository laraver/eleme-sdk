<?php

namespace Laraver\Waimai\Core;

use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\FilesystemCache;
use Laraver\Waimai\Support\Http;

abstract class AbstractAccessToken
{
    /**
     * App id.
     *
     * @var string
     */
    protected $appId;

    /**
     * App secret.
     *
     * @var string
     */
    protected $secret;

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

    /**
     * Cache key prefix.
     *
     * @var string
     */
    protected $prefix;

    protected $tokenJsonKey;

    protected $expiresKey;

    /**
     * @var Http
     */
    protected $http;

    public $token;

    /**
     * @param mixed $token
     * @param int   $expires
     *
     * @return $this
     */
    public function setToken($token, $expires = 86400)
    {
        $this->getCache()->save($this->getCacheKey(), $token, $expires - 1500);

        return $this;
    }

    /**
     * Get token from cache.
     *
     * @param bool $forceRefresh
     *
     * @return string
     */
    public function getToken($forceRefresh = false)
    {
        $cached = $this->getCache()->fetch($this->getCacheKey()) ?: $this->token;

        if ($forceRefresh || empty($cached)) {
            $result = $this->getTokenFromServer();

            $this->checkTokenResponse($result);

            $this->setToken($token = $result[$this->tokenJsonKey], $result[$this->expiresKey]);

            return $token;
        }

        return $cached;
    }

    abstract public function getTokenFromServer();

    abstract public function checkTokenResponse($result);

    /**
     * @param mixed $appId
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param string $secret
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Set cache instance.
     *
     * @param \Doctrine\Common\Cache\Cache $cache
     *
     * @return AbstractAccessToken
     */
    public function setCache(Cache $cache)
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * Return the cache manager.
     *
     * @return \Doctrine\Common\Cache\Cache
     */
    public function getCache()
    {
        return $this->cache ?: $this->cache = new FilesystemCache(sys_get_temp_dir());
    }

    public function getCacheKey()
    {
        if (is_null($this->cacheKey)) {
            return $this->prefix.$this->appId;
        }

        return $this->cacheKey;
    }

    /**
     * Return the http instance.
     *
     * @return Http
     */
    public function getHttp()
    {
        return $this->http ?: $this->http = new Http();
    }

    /**
     * Set the http instance.
     *
     * @param Http $http
     *
     * @return $this
     */
    public function setHttp(Http $http)
    {
        $this->http = $http;

        return $this;
    }
}
