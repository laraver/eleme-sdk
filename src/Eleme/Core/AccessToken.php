<?php

namespace Laraver\Waimai\Eleme\Core;

use Exception;
use Laraver\Waimai\Core\AbstractAccessToken;

class AccessToken extends AbstractAccessToken
{
    const API_URL = 'https://open-api.shop.ele.me';
    const SANDBOX_API_URL = 'https://open-api-sandbox.shop.ele.me';

    protected $prefix = 'laraver.waimai.eleme.token.';

    private $url;

    protected $tokenJsonKey = 'access_token';

    protected $expiresKey = 'expires_in';

    /**
     * Constructor.
     *
     * @param $appId
     * @param $secret
     * @param bool $debug
     *
     * @throws Exception
     */
    public function __construct($appId, $secret, $debug = false)
    {
        $this->appId = $appId;
        $this->secret = $secret;
        $this->url = $debug ? static::SANDBOX_API_URL : static::API_URL;
    }

    public function getTokenFromServer()
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

    public function checkTokenResponse($result)
    {
        if (isset($result['error'])) {
            throw new Exception($result['error_description']);
        }
    }

    public function getUrl()
    {
        return $this->url;
    }
}
