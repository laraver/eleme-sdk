<?php

namespace Laraver\Waimai\Eleme\Core;


use Doctrine\Common\Cache\Cache;
use Exception;
use Illuminate\Support\Arr;

class AccessToken
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
    private $cache;

    const API_URL = "https://open-api.shop.ele.me";
    const SANDBOX_API_URL = "https://open-api-sandbox.shop.ele.me";

    protected $prefix = 'laraver.waimai.eleme.token.';

    /**
     * Constructor.
     *
     * @param $config
     * @param Cache $cache
     * @throws Exception
     */
    public function __construct($config, Cache $cache)
    {
        if (!($appId = Arr::get($config, 'app_id')) || !($secret = Arr::get($config, 'secret'))) {
            throw new Exception('both app_id and secret are required!');
        }

        $this->appId = $appId;
        $this->secret = $secret;
        $this->cache = $cache;
        $this->url = Arr::get($config, 'debug', false) ? static::SANDBOX_API_URL : static::API_URL;
    }

    public function getToken($force = false)
    {
        $cacheKey = $this->getCacheKey();

        $cached = $this->cache->fetch($cacheKey);

        if($force || !$cached) {
            $token = $this->getTokenFromServer();

            $this->cache->save($cacheKey, $token['access_token'], $token['expires_in'] - 1800);

            return $token['access_token'];
        }

        return $cached;
    }

    private function getTokenFromServer()
    {
        $response = (new AbstractAPI($this))->getHttp()->post($this->url.'/token', [
            'grant_type' => 'client_credentials',
        ], true);

        return $response;
    }

    public function signature($params)
    {
        ksort($params);

        $text = '';
        foreach ($params as $key => $value) {
            $text .= $key . $value;
        }

        return md5($this->secret . $text . $this->secret);
    }

    public function signatureParam($method, $args, $version = '1.0')
    {
        $params = [
            'app_id' => $this->appId,
            'method' => $method,
            'timestamp' => date('Y-m-d H:i:s'),
            'v' => $version,
        ];

        $args = array_merge($args, $params);

        $args['sign'] = $this->signature($args);

        return $args;
    }

    public function getCacheKey()
    {
        if (is_null($this->cacheKey)) {
            return $this->prefix.$this->appId;
        }

        return $this->cacheKey;
    }

}