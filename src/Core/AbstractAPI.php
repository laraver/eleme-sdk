<?php

namespace Laraver\Waimai\Core;

use Exception;
use Laraver\Waimai\Support\Http;
use Psr\Http\Message\RequestInterface;

abstract class AbstractAPI
{
    /**
     * Http instance.
     *
     * @var Http
     */
    protected $http;

    /**
     * @return Http
     */
    public function getHttp()
    {
        if (is_null($this->http)) {
            $this->http = new Http();
        }

        if (count($this->http->getMiddlewares()) === 0) {
            $this->middlewares();
        }

        return $this->http;
    }

    /**
     * add headers.
     *
     * @param $headers
     *
     * @return \Closure
     */
    protected function headerMiddleware($headers)
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

    abstract public function middlewares();

    /**
     * Parse JSON from response and check error.
     *
     * @param $api
     * @param array  $args
     * @param string $method
     *
     * @return mixed
     */
    abstract public function parseJSON($api, array $args = [], $method = 'post');

    /**
     * Check the array data errors, and Throw exception when the contents contains error.
     *
     * @param array $content
     *
     * @throws Exception
     */
    abstract protected function checkAndThrow($content);
}
