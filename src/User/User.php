<?php

namespace Laraver\Eleme\User;

use Laraver\Eleme\Core\Api;

class User extends Api
{
    /**
     * 获取商户账号信息.
     *
     * @return array
     */
    public function getUser()
    {
        $result = $this->parseJSON('eleme.user.getUser');

        return $result;
    }
}
