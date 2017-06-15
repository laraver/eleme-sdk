<?php

namespace Laraver\Eleme\Message;

use Laraver\Eleme\Core\Api;

class Message extends Api
{
    /**
     * 获取未到达的推送消息.
     *
     * @param $appId
     *
     * @return array
     */
    public function getNonReachedMessages($appId)
    {
        $result = $this->parseJSON('eleme.message.getNonReachedMessages', ['appId' => $appId]);

        return $result;
    }

    /**
     * 获取未到达的推送消息实体.
     *
     * @param $appId
     *
     * @return array
     */
    public function getNonReachedOMessages($appId)
    {
        $result = $this->parseJSON('eleme.message.getNonReachedOMessages', ['appId' => $appId]);

        return $result;
    }
}
