<?php

namespace Laraver\Waimai\Eleme\Oauth;

use Laraver\Waimai\Eleme\Core\Api as CoreApi;
use Symfony\Component\HttpFoundation\Request;

class Api extends CoreApi
{
    /**
     * The request token.
     *
     * @var AuthorizerAccessToken
     */
    public $accessToken;

    /**
     * @var Request
     */
    protected $request;

    public function __construct(AuthorizerAccessToken $accessToken, $request)
    {
        parent::__construct($accessToken);
        $this->request = $request;
    }

    /**
     * get a code from redirect uri.
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->request->get('code');
    }

    /**
     * get a state from redirect uri.
     *
     * @return mixed
     */
    public function getState()
    {
        return $this->request->get('state');
    }

    /**
     * @param null $authCode
     *
     * @return mixed|string
     */
    public function getToken($authCode = null)
    {
        return $this->accessToken->getTokenFromServer($authCode);
    }
}
