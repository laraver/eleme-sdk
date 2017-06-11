<?php

namespace Laraver\Waimai\Eleme\Oauth;

use Illuminate\Support\Str;
use Laraver\Waimai\Eleme\Eleme;
use Pimple\Container;

/**
 * Class Oauth.
 *
 * @property \Laraver\Waimai\Eleme\Oauth\Api                    $api
 * @property \Laraver\Waimai\Eleme\Oauth\PreAuthorization       $pre_auth
 *
 * @method array getToken($authCode = null)
 * @method array getCode()
 * @method array getState()
 */
class Oauth
{
    /**
     * Container.
     *
     * @var \Pimple\Container
     */
    protected $container;

    /**
     * ContainerAccess constructor.
     *
     * @param Eleme|Container $container
     */
    public function __construct(Eleme $container)
    {
        $this->container = $container;
    }

    /**
     * Create an instance of the Eleme for the given authorizer.
     *
     * @param $token
     *
     * @return Eleme
     */
    public function createAuthorizerApplication($token)
    {
        $this->fetch('authorizer_access_token', function (AuthorizerAccessToken $accessToken) use ($token) {
            $accessToken->token = $token;
        });

        return $this->fetch('app', function ($app) use ($token) {
            $app['access_token'] = $this->fetch('authorizer_access_token');
        });
    }

    /**
     * Fetches from pimple container.
     *
     * @param $key
     * @param callable|null $callable
     *
     * @return mixed
     */
    private function fetch($key, callable $callable = null)
    {
        $instance = $this->$key;

        if (!is_null($callable)) {
            $callable($instance);
        }

        return $instance;
    }

    /**
     * magic method.
     *
     * @param $method
     * @param $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->api, $method], $args);
    }

    /**
     * magic method.
     *
     * @param $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        $className = basename(str_replace('\\', '/', static::class));

        $name = Str::snake($className).'.'.$key;

        return $this->container->offsetGet($name);
    }
}
