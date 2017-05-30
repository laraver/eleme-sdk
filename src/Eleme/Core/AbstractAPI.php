<?php
/**
 * Created by PhpStorm.
 * User: Laraver
 * Date: 2017/2/22
 * Time: 22:40
 */

namespace Laraver\Waimai\Eleme\Core;


use GuzzleHttp\Client;
use Laraver\Waimai\Eleme\Core\AccessToken;
use Laraver\Waimai\Support\Http;
use Laraver\Youzan\Core\Exceptions\HttpException;
use Illuminate\Support\Collection;
use Psr\Http\Message\RequestInterface;

class AbstractAPI
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
     * @return Http
     */
    public function getHttp()
    {
        if (is_null($this->http)) {
            $this->http = new Http();
        }

        if (count($this->http->getMiddlewares()) === 0) {
            $this->registerHttpMiddlewares();
        }

        return $this->http;
    }

    private function registerHttpMiddlewares()
    {
        print_r($this->accessToken);
        $this->http->addMiddleware($this->headerMiddleware([
            'Authorization' => 'Basic ' . base64_encode($this->accessToken->appId.':'.$this->accessToken->secret),
            'Content-Type' => 'application/x-www-form-urlencoded; charset=utf-8',
            'Accept-Encoding' => 'gzip'
        ]));
    }

    private function headerMiddleware($headers)
    {
        return function (callable $handler) use ($headers) {
            return function (RequestInterface $request, array $options) use ($handler, $headers) {
                foreach ($headers as $key => $header) {
                    $request = $request->withHeader($key, $header);
                }

                return $handler($request, $options);
            };
        };
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
     * Parse JSON from response and check error.
     *
     * @param string $method
     * @param $api
     * @param array $args
     * @return mixed
     */
    public function parseJSON($method, $api, array $args)
    {
        $http = $this->getHttp();

        $args[1] = $this->accessToken->signatureParam($api, $args[1], $this->version);

        $result = json_decode(call_user_func_array([$http, $method], $args), true);

        $this->checkAndThrow($result);

        return $result;
    }

    /**
     * Check the array data errors, and Throw exception when the contents contains error.
     *
     * @param array $content
     * @throws HttpException
     */
    protected function checkAndThrow(array $content)
    {
        if (isset($content['error_response'])) {
            throw new HttpException($content['error_response']['msg'], $content['error_response']['code']);
        }
    }

    /**
     * set the api version
     *
     * @param $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }
}