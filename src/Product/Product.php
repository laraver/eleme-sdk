<?php

namespace Laraver\Eleme\Product;

use Laraver\Eleme\Core\Api;

class Product extends Api
{
    /**
     * 查询店铺商品分类.
     *
     * @param $shopId
     *
     * @return array
     */
    public function getShopCategories($shopId)
    {
        $result = $this->parseJSON('eleme.product.category.getShopCategories', ['shopId' => $shopId]);

        return $result;
    }

    /**
     * 查询店铺商品分类，包含二级分类.
     *
     * @param $shopId
     *
     * @return array
     */
    public function getShopCategoriesWithChildren($shopId)
    {
        $result = $this->parseJSON('eleme.product.category.getShopCategoriesWithChildren', ['shopId' => $shopId]);

        return $result;
    }

    /**
     * 查询商品分类详情.
     *
     * @param $categoryId
     *
     * @return array
     */
    public function getCategory($categoryId)
    {
        $result = $this->parseJSON('eleme.product.category.getCategory', ['categoryId' => $categoryId]);

        return $result;
    }

    /**
     * 查询商品分类详情，包含二级分类.
     *
     * @param $categoryId
     *
     * @return array
     */
    public function getCategoryWithChildren($categoryId)
    {
        $result = $this->parseJSON('eleme.product.category.getCategoryWithChildren', ['categoryId' => $categoryId]);

        return $result;
    }

    /**
     * 添加商品分类.
     *
     * @param $params
     *
     * @return array
     */
    public function createCategory($params)
    {
        $result = $this->parseJSON('eleme.product.category.createCategory', $params);

        return $result;
    }

    /**
     * 添加商品分类，支持二级分类.
     *
     * @param $params
     *
     * @return array
     */
    public function createCategoryWithChildren($params)
    {
        $result = $this->parseJSON('eleme.product.category.createCategoryWithChildren', $params);

        return $result;
    }

    /**
     * 更新商品分类.
     *
     * @param $params
     *
     * @return array
     */
    public function updateCategory($params)
    {
        $result = $this->parseJSON('eleme.product.category.updateCategory', $params);

        return $result;
    }

    /**
     * 更新商品分类，包含二级分类.
     *
     * @param $params
     *
     * @return array
     */
    public function updateCategoryWithChildren($params)
    {
        $result = $this->parseJSON('eleme.product.category.updateCategoryWithChildren', $params);

        return $result;
    }

    /**
     * 删除商品分类.
     *
     * @param $categoryId
     *
     * @return array
     */
    public function removeCategory($categoryId)
    {
        $result = $this->parseJSON('eleme.product.category.removeCategory', ['categoryId' => $categoryId]);

        return $result;
    }

    /**
     * 设置分类排序.
     *
     * @param $params
     *
     * @return array
     */
    public function setCategoryPositions($params)
    {
        $result = $this->parseJSON('eleme.product.category.setCategoryPositions', $params);

        return $result;
    }

    /**
     * 设置二级分类排序.
     *
     * @param $params
     *
     * @return array
     */
    public function setCategoryPositionsWithChildren($params)
    {
        $result = $this->parseJSON('eleme.product.category.setCategoryPositionsWithChildren', $params);

        return $result;
    }

    /**
     * 查询商品后台类目.
     *
     * @param $shopId
     *
     * @return array
     */
    public function getBackCategory($shopId)
    {
        $result = $this->parseJSON('eleme.product.category.getBackCategory', ['shopId' => $shopId]);

        return $result;
    }

    /**
     * 上传图片，返回图片的hash值
     *
     * @param $image
     *
     * @return array
     */
    public function uploadImage($image)
    {
        $result = $this->parseJSON('eleme.file.uploadImage', ['image' => $image]);

        return $result;
    }

    /**
     * 通过远程URL上传图片，返回图片的hash值
     *
     * @param $url
     *
     * @return array
     */
    public function uploadImageWithRemoteUrl($url)
    {
        $result = $this->parseJSON('eleme.file.uploadImageWithRemoteUrl', ['url' => $url]);

        return $result;
    }

    /**
     * 获取上传文件的访问URL，返回文件的Url地址
     *
     * @param $hash
     *
     * @return array
     */
    public function getUploadedUrl($hash)
    {
        $result = $this->parseJSON('eleme.file.getUploadedUrl', ['hash' => $hash]);

        return $result;
    }

    /**
     * 获取一个分类下的所有商品
     *
     * @param $categoryId
     *
     * @return array
     */
    public function getItemsByCategoryId($categoryId)
    {
        $result = $this->parseJSON('eleme.product.item.getItemsByCategoryId', ['categoryId' => $categoryId]);

        return $result;
    }

    /**
     * 查询商品详情.
     *
     * @param $itemId
     *
     * @return array
     */
    public function getItem($itemId)
    {
        $result = $this->parseJSON('eleme.product.item.getItem', ['itemId' => $itemId]);

        return $result;
    }

    /**
     * 批量查询商品详情.
     *
     * @param $itemIds
     *
     * @return array
     */
    public function batchGetItems($itemIds)
    {
        $result = $this->parseJSON('eleme.product.item.batchGetItems', ['itemIds' => $itemIds]);

        return $result;
    }

    /**
     * 添加商品
     *
     * @param $params
     *
     * @return array
     */
    public function createItem($params)
    {
        $result = $this->parseJSON('eleme.product.item.createItem', $params);

        return $result;
    }

    /**
     * 批量添加商品
     *
     * @param $params
     *
     * @return array
     */
    public function batchCreateItems($params)
    {
        $result = $this->parseJSON('eleme.product.item.batchCreateItems', $params);

        return $result;
    }

    /**
     * 更新商品
     *
     * @param $params
     *
     * @return array
     */
    public function updateItem($params)
    {
        $result = $this->parseJSON('eleme.product.item.updateItem', $params);

        return $result;
    }

    /**
     * 批量置满库存.
     *
     * @param $specIds
     *
     * @return array
     */
    public function batchFillStock($specIds)
    {
        $result = $this->parseJSON('eleme.product.item.batchFillStock', ['specIds' => $specIds]);

        return $result;
    }

    /**
     * 批量沽清库存.
     *
     * @param $specIds
     *
     * @return array
     */
    public function batchClearStock($specIds)
    {
        $result = $this->parseJSON('eleme.product.item.batchClearStock', ['specIds' => $specIds]);

        return $result;
    }

    /**
     * 批量上架商品.
     *
     * @param $specIds
     *
     * @return array
     */
    public function batchOnShelf($specIds)
    {
        $result = $this->parseJSON('eleme.product.item.batchOnShelf', ['specIds' => $specIds]);

        return $result;
    }

    /**
     * 批量下架商品.
     *
     * @param $specIds
     *
     * @return array
     */
    public function batchOffShelf($specIds)
    {
        $result = $this->parseJSON('eleme.product.item.batchOffShelf', ['specIds' => $specIds]);

        return $result;
    }

    /**
     * 删除商品.
     *
     * @param $itemId
     *
     * @return array
     */
    public function removeItem($itemId)
    {
        $result = $this->parseJSON('eleme.product.item.removeItem', ['itemId' => $itemId]);

        return $result;
    }

    /**
     * 批量删除商品.
     *
     * @param $itemIds
     *
     * @return array
     */
    public function batchRemoveItems($itemIds)
    {
        $result = $this->parseJSON('eleme.product.item.batchRemoveItems', ['itemIds' => $itemIds]);

        return $result;
    }

    /**
     * 批量更新商品库存.
     *
     * @param $params
     *
     * @return array
     */
    public function batchUpdateSpecStocks($params)
    {
        $result = $this->parseJSON('eleme.product.item.batchUpdateSpecStocks', $params);

        return $result;
    }

    /**
     * 设置商品排序.
     *
     * @param $params
     *
     * @return array
     */
    public function setItemPositions($params)
    {
        $result = $this->parseJSON('eleme.product.item.setItemPositions', $params);

        return $result;
    }

    /**
     * 批量沽清库存并在次日2:00开始置满.
     *
     * @param $clearStocks
     *
     * @return array
     */
    public function clearAndTimingMaxStock($clearStocks)
    {
        $result = $this->parseJSON('eleme.product.item.clearAndTimingMaxStock', ['clearStocks' => $clearStocks]);

        return $result;
    }

    /**
     * 设置商品排序.
     *
     * @param $params
     *
     * @return array
     */
    public function getItemByShopIdAndExtendCode($params)
    {
        $result = $this->parseJSON('eleme.product.item.getItemByShopIdAndExtendCode', $params);

        return $result;
    }

    /**
     * 根据商品条形码获取商品.
     *
     * @param $params
     *
     * @return array
     */
    public function getItemsByShopIdAndBarCode($params)
    {
        $result = $this->parseJSON('eleme.product.item.getItemsByShopIdAndBarCode', $params);

        return $result;
    }

    /**
     * 批量修改商品价格.
     *
     * @param $params
     *
     * @return array
     */
    public function batchUpdatePrices($params)
    {
        $result = $this->parseJSON('eleme.product.item.batchUpdatePrices', $params);

        return $result;
    }
}
