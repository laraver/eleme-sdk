<?php

namespace Laraver\Waimai\Eleme\ServiceProviders;

use Laraver\Waimai\Eleme\Eleme;
use Laraver\Waimai\Eleme\Oauth\Api;
use Laraver\Waimai\Eleme\Oauth\AuthorizerAccessToken;
use Laraver\Waimai\Eleme\Oauth\Oauth;
use Laraver\Waimai\Eleme\Oauth\PreAuthorization;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class OauthServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['oauth'] = function ($pimple) {
            $oauth = new Oauth($pimple);

            return $oauth;
        };

        $pimple['oauth.app'] = function ($pimple) {
            return new Eleme($pimple['config']->toArray());
        };

        $pimple['oauth.authorizer_access_token'] = function ($pimple) {
            $accessToken = new AuthorizerAccessToken(
                $pimple['config']['app_id'],
                $pimple['config']['secret'],
                $pimple['request'],
                $pimple['config']->get('debug')
            );

            $accessToken->setCache($pimple['cache']);
            $accessToken->setRedirectUri($pimple['config']->get('redirect_uri'));

            return $accessToken;
        };

        $pimple['oauth.pre_auth'] = function ($pimple) {
            $oauth = new PreAuthorization($pimple['oauth.authorizer_access_token'], $pimple['request']);

            return $oauth;
        };

        $pimple['oauth.api'] = function ($pimple) {
            return new Api($pimple['oauth.authorizer_access_token'], $pimple['request']);
        };
    }
}
