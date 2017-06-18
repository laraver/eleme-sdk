<?php

namespace Laraver\Eleme\Oauth;

class PreAuthorization extends Api
{
    private $state;

    /**
     * 获取授权链接.
     *
     * @return string
     */
    public function getTargetUrl()
    {
        return $this->accessToken->getUrl().'/authorize?'.http_build_query([
                'response_type' => 'code',
                'client_id'     => $this->accessToken->getAppId(),
                'state'         => $this->state ?: $this->accessToken->createUuid(),
                'redirect_uri'  => $this->accessToken->getRedirectUri(),
                'scope'         => $this->accessToken->getScope(),
            ]);
    }

    /**
     * 设置回调链接.
     *
     * @param $url
     *
     * @return $this
     */
    public function request($url)
    {
        $this->accessToken->setRedirectUri($url);

        return $this;
    }

    /**
     * 设置 state.
     *
     * @param $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * 跳转至授权页面.
     */
    public function redirect()
    {
        header('Location:'.$this->getTargetUrl());
    }
}
