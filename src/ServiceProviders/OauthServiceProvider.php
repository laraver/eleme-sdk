<?php

namespace Laraver\Eleme\ServiceProviders;

use Laraver\Eleme\Eleme;
use Laraver\Eleme\Oauth\Api;
use Laraver\Eleme\Oauth\AuthorizerAccessToken;
use Laraver\Eleme\Oauth\Oauth;
use Laraver\Eleme\Oauth\PreAuthorization;
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
                $pimple['config']->get('debug')
            );

            $accessToken->setRequest($pimple['request']);
            $accessToken->setCache($pimple['cache']);
            $accessToken->setRedirectUri($pimple['config']->get('redirect_uri'));

            return $accessToken;
        };

        $pimple['oauth.pre_auth'] = function ($pimple) {
            $oauth = new PreAuthorization($pimple['oauth.authorizer_access_token']);

            $oauth->setRequest($pimple['request']);

            return $oauth;
        };

        $pimple['oauth.api'] = function ($pimple) {
            $api = new Api($pimple['oauth.authorizer_access_token']);

            $api->setRequest($pimple['request']);

            return $api;
        };
    }
}
