<?php

namespace Laraver\Eleme\Core;

use Exception;
use Hanson\Foundation\AbstractAPI;

class Api extends AbstractAPI
{
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
     * @return AccessToken
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Parse JSON from response and check error.
     *
     * @param $api
     * @param array $args
     *
     * @return mixed
     */
    public function parseJSON($api, array $args = [])
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

        $response = $http->json($this->accessToken->getUrl().'/api/v1', $protocol);

        $result = json_decode(strval($response->getBody()), true);

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
