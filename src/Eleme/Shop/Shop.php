<?php

namespace Laraver\Waimai\Eleme\Shop;

use Laraver\Waimai\Eleme\Core\Api;

class Shop extends Api
{
    /**
     * 查询店铺信息.
     *
     * @param $shopId
     *
     * @return Collection
     */
    public function getShop($shopId)
    {
        $result = $this->parseJSON('eleme.shop.getShop', ['shopId' => $shopId]);

        return new Collection($result);
    }

    /**
     * 更新店铺基本信息.
     *
     * @param $params
     *
     * @return Collection
     */
    public function updateShop($params)
    {
        $result = $this->parseJSON('eleme.shop.updateShop', $params);

        return new Collection($result);
    }

    /**
     * 批量获取店铺简要.
     *
     * @param $shopIds
     *
     * @return Collection
     */
    public function mgetShopStatus($shopIds)
    {
        $result = $this->parseJSON('eleme.shop.mgetShopStatus', ['shopIds' => $shopIds]);

        return new Collection($result);
    }

    /**
     * 设置送达时间.
     *
     * @param $params
     *
     * @return Collection
     */
    public function setDeliveryTime($params)
    {
        $result = $this->parseJSON('eleme.shop.setDeliveryTime', $params);

        return new Collection($result);
    }

    /**
     * 设置是否支持在线退单.
     *
     * @param $params
     *
     * @return Collection
     */
    public function setOnlineRefund($params)
    {
        $result = $this->parseJSON('eleme.shop.setOnlineRefund', $params);

        return new Collection($result);
    }
}
