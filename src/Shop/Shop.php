<?php

namespace Laraver\Eleme\Shop;

use Laraver\Eleme\Core\Api;

class Shop extends Api
{
    /**
     * 查询店铺信息.
     *
     * @param $shopId
     *
     * @return array
     */
    public function getShop($shopId)
    {
        $result = $this->parseJSON('eleme.shop.getShop', ['shopId' => $shopId]);

        return $result;
    }

    /**
     * 更新店铺基本信息.
     *
     * @param $params
     *
     * @return array
     */
    public function updateShop($params)
    {
        $result = $this->parseJSON('eleme.shop.updateShop', $params);

        return $result;
    }

    /**
     * 批量获取店铺简要.
     *
     * @param $shopIds
     *
     * @return array
     */
    public function mgetShopStatus($shopIds)
    {
        $result = $this->parseJSON('eleme.shop.mgetShopStatus', ['shopIds' => $shopIds]);

        return $result;
    }

    /**
     * 设置送达时间.
     *
     * @param $params
     *
     * @return array
     */
    public function setDeliveryTime($params)
    {
        $result = $this->parseJSON('eleme.shop.setDeliveryTime', $params);

        return $result;
    }

    /**
     * 设置是否支持在线退单.
     *
     * @param $params
     *
     * @return array
     */
    public function setOnlineRefund($params)
    {
        $result = $this->parseJSON('eleme.shop.setOnlineRefund', $params);

        return $result;
    }
}
