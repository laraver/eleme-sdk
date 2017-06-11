<?php

namespace Laraver\Waimai\Eleme\Core;

use Exception;
use Laraver\Waimai\Core\AbstractAccessToken;
use Laraver\Waimai\Core\AbstractAPI;
use Laraver\Waimai\Support\Http;

class Api extends AbstractAPI
{
    /**
     * Http instance.
     *
     * @var Http
     */
    protected $http;

    /**
     * The request token.
     *
     * @var AccessToken
     */
    protected $accessToken;

    /**
     * Constructor.
     *
     * @param AccessToken $accessToken
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->setAccessToken($accessToken);
    }

    /**
     * Set the request token.
     *
     * @param AccessToken $accessToken
     *
     * @return $this
     */
    public function setAccessToken(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * @return AbstractAccessToken
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Parse JSON from response and check error.
     *
     * @param $api
     * @param array  $args
     * @param string $method
     *
     * @return mixed
     */
    public function parseJSON($api, array $args = [], $method = 'post')
    {
        $http = $this->getHttp();

        $protocol = [
            'nop'    => '1.0.0',
            'id'     => $this->accessToken->createUuid(),
            'action' => $api,
            'token'  => $this->accessToken->getToken(),
            'metas'  => [
                'app_key'   => $this->accessToken->getAppId(),
                'timestamp' => time(),
            ],
            'params' => $args,
        ];

        $protocol['signature'] = $this->accessToken->signature($protocol);

        $result = $http->json($this->accessToken->getUrl().'/api/v1', $protocol, true);

        $this->checkAndThrow($result);

        return $result;
    }

    /**
     * Check the array data errors, and Throw exception when the contents contains error.
     *
     * @param array $content
     *
     * @throws Exception
     */
    protected function checkAndThrow($content)
    {
        if (!$content) {
            throw new Exception('invalid response.');
        }

        if (isset($content['error'])) {
            throw new Exception($content['error']['message']);
        }
    }

    public function middlewares()
    {
        $this->http->addMiddleware($this->headerMiddleware([
            'Authorization'   => 'Basic '.base64_encode($this->accessToken->getAppId().':'.$this->accessToken->getSecret()),
            'Accept-Encoding' => 'gzip',
        ]));
    }
}
