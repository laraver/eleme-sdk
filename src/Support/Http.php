<?php


namespace Laraver\Waimai\Support;


use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\RequestInterface;

/**
 * Class Http
 * @package Laraver\Waimai\Support
 *
 */
class Http
{

    protected $middlewares = [];

    /**
     * @var Client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param $url
     * @param array $query
     * @param bool $isArray
     * @return mixed|string
     */
    public function post($url, $query = [], $isArray = false)
    {
        $content = $this->request('post', $url, ['form_params' => $query]);

        return $isArray ? json_decode($content, true) : $content;
    }

    public function json($url, $query = [], $isArray = false)
    {
        $content = $this->request('post', $url, ['json' => $query]);

        return $isArray ? json_decode($content, true) : $content;
    }

    /**
     * send a request.
     *
     * @param $method
     * @param $url
     * @param array $options
     * @return string
     */
    public function request($method, $url, $options = [])
    {
        $options['handler'] = $this->getHandler();

        $response = $this->client->request($method, $url, $options);

        return $response->getBody()->getContents();
    }

    public function getMiddlewares()
    {
        return $this->middlewares;
    }

    public function addMiddleware(callable $middleware)
    {
        array_push($this->middlewares, $middleware);

        return $this;
    }

    protected function getHandler()
    {

        $stack = new HandlerStack();
        $stack->setHandler(new CurlHandler());

        foreach ($this->middlewares as $middleware) {
            $stack->push($middleware);
        }

        return $stack;
    }

}