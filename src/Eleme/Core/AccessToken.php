<?php

namespace Laraver\Waimai\Eleme\Core;

use Doctrine\Common\Cache\Cache;
use Exception;
use Illuminate\Support\Arr;
use Laraver\Waimai\Core\AbstractAccessToken;

class AccessToken extends AbstractAccessToken
{

    const API_URL = 'https://open-api.shop.ele.me';
    const SANDBOX_API_URL = 'https://open-api-sandbox.shop.ele.me';

    protected $prefix = 'laraver.waimai.eleme.token.';

    /**
     * Constructor.
     *
     * @param $config
     * @param Cache $cache
     *
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

        if ($force || !$cached) {
            $token = $this->getTokenFromServer();

            $this->cache->save($cacheKey, $token['access_token'], $token['expires_in'] - 1800);

            return $token['access_token'];
        }

        return $cached;
    }

    private function getTokenFromServer()
    {
        $response = (new Api($this))->getHttp()->post($this->url.'/token', [
            'grant_type' => 'client_credentials',
        ], true);

        return $response;
    }

    public function signature($protocol)
    {
        $merged = array_merge($protocol['metas'], $protocol['params']);
        ksort($merged);
        $string = '';

        foreach ($merged as $key => $value) {
            $string .= $key.'='.json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }

        $splice = $protocol['action'].$this->getToken().$string.$this->secret;

        return strtoupper(md5($splice));
    }

    public function createUuid()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)

        );
    }

    public function getPrefix()
    {
        return 'laraver.waimai.eleme.token.';
    }
}
