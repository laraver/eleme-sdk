<?php

namespace Laraver\Eleme\Order;

use Laraver\Eleme\Core\Api;

class Order extends Api
{
    /**
     * 获取订单.
     *
     * @param $orderId
     *
     * @return array
     */
    public function getOrder($orderId)
    {
        $result = $this->parseJSON('eleme.order.getOrder', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * 批量获取订单.
     *
     * @param $orderIds
     *
     * @return array
     */
    public function mgetOrders($orderIds)
    {
        $result = $this->parseJSON('eleme.order.mgetOrders', ['orderIds' => $orderIds]);

        return $result;
    }

    /**
     * 确认订单(推荐).
     *
     * @param $orderId
     *
     * @return array
     */
    public function confirmOrderLite($orderId)
    {
        $result = $this->parseJSON('eleme.order.confirmOrderLite', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * 确认订单.
     *
     * @param $orderId
     *
     * @return array
     */
    public function confirmOrder($orderId)
    {
        $result = $this->parseJSON('eleme.order.confirmOrder', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * 取消订单(推荐).
     *
     * @param $params
     *
     * @return array
     */
    public function cancelOrderLite($params)
    {
        $result = $this->parseJSON('eleme.order.cancelOrderLite', $params);

        return $result;
    }

    /**
     * 取消订单.
     *
     * @param $params
     *
     * @return array
     */
    public function cancelOrder($params)
    {
        $result = $this->parseJSON('eleme.order.cancelOrder', $params);

        return $result;
    }

    /**
     * 同意退单/同意取消单(推荐).
     *
     * @param $orderId
     *
     * @return array
     */
    public function agreeRefundLite($orderId)
    {
        $result = $this->parseJSON('eleme.order.agreeRefundLite', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * 同意退单/同意取消单.
     *
     * @param $orderId
     *
     * @return array
     */
    public function agreeRefund($orderId)
    {
        $result = $this->parseJSON('eleme.order.agreeRefund', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * 不同意退单/不同意取消单(推荐).
     *
     * @param $params
     *
     * @return array
     */
    public function disagreeRefundLite($params)
    {
        $result = $this->parseJSON('eleme.order.disagreeRefundLite', $params);

        return $result;
    }

    /**
     * 不同意退单/不同意取消单.
     *
     * @param $params
     *
     * @return array
     */
    public function disagreeRefund($params)
    {
        $result = $this->parseJSON('eleme.order.disagreeRefund', $params);

        return $result;
    }

    /**
     * 获取订单�
     * �送记录.
     *
     * @param $orderId
     *
     * @return array
     */
    public function getDeliveryStateRecord($orderId)
    {
        $result = $this->parseJSON('eleme.order.getDeliveryStateRecord', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * 批量获取订单最新�
     * �送记录.
     *
     * @param $orderIds
     *
     * @return array
     */
    public function batchGetDeliveryStates($orderIds)
    {
        $result = $this->parseJSON('eleme.order.batchGetDeliveryStates', ['orderIds' => $orderIds]);

        return $result;
    }

    /**
     * �
     * �送异常或�
     * 物流拒单后选择自行�
     * �送(推荐).
     *
     * @param $orderId
     *
     * @return array
     */
    public function deliveryBySelfLite($orderId)
    {
        $result = $this->parseJSON('eleme.order.deliveryBySelfLite', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * �
     * �送异常或�
     * 物流拒单后选择自行�
     * �送.
     *
     * @param $orderId
     *
     * @return array
     */
    public function deliveryBySelf($orderId)
    {
        $result = $this->parseJSON('eleme.order.deliveryBySelf', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * �
     * �送异常或�
     * 物流拒单后选择不再�
     * �送(推荐).
     *
     * @param $orderId
     *
     * @return array
     */
    public function noMoreDeliveryLite($orderId)
    {
        $result = $this->parseJSON('eleme.order.noMoreDeliveryLite', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * �
     * �送异常或�
     * 物流拒单后选择不再�
     * �送.
     *
     * @param $orderId
     *
     * @return array
     */
    public function noMoreDelivery($orderId)
    {
        $result = $this->parseJSON('eleme.order.noMoreDelivery', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * 订单确认送达(推荐).
     *
     * @param $orderId
     *
     * @return array
     */
    public function receivedOrderLite($orderId)
    {
        $result = $this->parseJSON('eleme.order.receivedOrderLite', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * 订单确认送达.
     *
     * @param $orderId
     *
     * @return array
     */
    public function receivedOrder($orderId)
    {
        $result = $this->parseJSON('eleme.order.receivedOrder', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * 回复催单.
     *
     * @param $params
     *
     * @return array
     */
    public function replyReminder($params)
    {
        $result = $this->parseJSON('eleme.order.replyReminder', $params);

        return $result;
    }

    /**
     * 获取指定订单菜品活动价格.
     *
     * @param $orderId
     *
     * @return array
     */
    public function getCommodities($orderId)
    {
        $result = $this->parseJSON('eleme.order.getCommodities', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * 批量获取订单菜品活动价格.
     *
     * @param $orderIds
     *
     * @return array
     */
    public function mgetCommodities($orderIds)
    {
        $result = $this->parseJSON('eleme.order.mgetCommodities', ['orderIds' => $orderIds]);

        return $result;
    }

    /**
     * 获取订单退款信息.
     *
     * @param $orderId
     *
     * @return array
     */
    public function getRefundOrder($orderId)
    {
        $result = $this->parseJSON('eleme.order.getRefundOrder', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * 批量获取订单退款信息.
     *
     * @param $orderIds
     *
     * @return array
     */
    public function mgetRefundOrders($orderIds)
    {
        $result = $this->parseJSON('eleme.order.mgetRefundOrders', ['orderIds' => $orderIds]);

        return $result;
    }

    /**
     * 取消呼叫�
     * �送.
     *
     * @param $orderId
     *
     * @return array
     */
    public function cancelDelivery($orderId)
    {
        $result = $this->parseJSON('eleme.order.cancelDelivery', ['orderId' => $orderId]);

        return $result;
    }

    /**
     * 呼叫�
     * �送.
     *
     * @param $params
     *
     * @return array
     */
    public function callDelivery($params)
    {
        $result = $this->parseJSON('eleme.order.callDelivery', $params);

        return $result;
    }

    /**
     * 获取店铺未回复的催单.
     *
     * @param $shopId
     *
     * @return array
     */
    public function getUnreplyReminders($shopId)
    {
        $result = $this->parseJSON('eleme.order.getUnreplyReminders', ['shopId' => $shopId]);

        return $result;
    }

    /**
     * 查询店铺未处理订单.
     *
     * @param $shopId
     *
     * @return array
     */
    public function getUnprocessOrders($shopId)
    {
        $result = $this->parseJSON('eleme.order.getUnprocessOrders', ['shopId' => $shopId]);

        return $result;
    }

    /**
     * 查询店铺未处理的取消单.
     *
     * @param $shopId
     *
     * @return array
     */
    public function getCancelOrders($shopId)
    {
        $result = $this->parseJSON('eleme.order.getCancelOrders', ['shopId' => $shopId]);

        return $result;
    }

    /**
     * 查询店铺未处理的退单.
     *
     * @param $shopId
     *
     * @return array
     */
    public function getRefundOrders($shopId)
    {
        $result = $this->parseJSON('eleme.order.getRefundOrders', ['shopId' => $shopId]);

        return $result;
    }

    /**
     * 查询�
     * �部订单.
     *
     * @param $params
     *
     * @return array
     */
    public function getAllOrders($params)
    {
        $result = $this->parseJSON('eleme.order.getAllOrders', $params);

        return $result;
    }
}
