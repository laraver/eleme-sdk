<?php

namespace Laraver\Waimai\Eleme\Packs;

use Illuminate\Support\Collection;
use Laraver\Waimai\Eleme\Core\Api;

class packs extends Api
{
    /**
     * 查询店铺当前生效合同类型.
     *
     * @param $shopId
     *
     * @return Collection
     */
    public function getEffectServicePackContract($shopId)
    {
        $result = $this->parseJSON('eleme.packs.getEffectServicePackContract', ['shopId' => $shopId]);

        return new Collection($result);
    }
}
