<?php

namespace Laraver\Waimai\Eleme\Message;

use Illuminate\Support\Collection;
use Laraver\Waimai\Eleme\Core\Api;

class Message extends Api
{
    /**
     * 获取未到达的推送消息.
     *
     * @param $appId
     *
     * @return Collection
     */
    public function getNonReachedMessages($appId)
    {
        $result = $this->parseJSON('eleme.message.getNonReachedMessages', ['appId' => $appId]);

        return new Collection($result);
    }

    /**
     * 获取未到达的推送消息实体.
     *
     * @param $appId
     *
     * @return Collection
     */
    public function getNonReachedOMessages($appId)
    {
        $result = $this->parseJSON('eleme.message.getNonReachedOMessages', ['appId' => $appId]);

        return new Collection($result);
    }
}
