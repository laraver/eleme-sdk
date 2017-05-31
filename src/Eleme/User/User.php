<?php

namespace Laraver\Waimai\Eleme\User;

use Laraver\Waimai\Eleme\Core\Api;

class User extends Api
{
    /**
     * 获取商户账号信息.
     *
     * @return Collection
     */
    public function getUser()
    {
        $result = $this->parseJSON('eleme.user.getUser');

        return new Collection($result);
    }

    /**
     * 获取当前授权帐号的手机号,特权接口仅部分帐号可以调用.
     *
     * @return Collection
     */
    public function getPhoneNumber()
    {
        $result = $this->parseJSON('eleme.user.getPhoneNumber');

        return new Collection($result);
    }
}
