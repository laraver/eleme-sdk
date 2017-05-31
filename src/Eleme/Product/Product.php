<?php

namespace Laraver\Waimai\Eleme\Product;

use Illuminate\Support\Collection;
use Laraver\Waimai\Eleme\Core\Api;

class Product extends Api
{
    /**
     * 查询店铺商品分类.
     *
     * @param $shopId
     *
     * @return Collection
     */
    public function getShopCategories($shopId)
    {
        $result = $this->parseJSON('eleme.product.category.getShopCategories', ['shopId' => $shopId]);

        return new Collection($result);
    }

    /**
     * 查询店铺商品分类，包含二级分类.
     *
     * @param $shopId
     *
     * @return Collection
     */
    public function getShopCategoriesWithChildren($shopId)
    {
        $result = $this->parseJSON('eleme.product.category.getShopCategoriesWithChildren', ['shopId' => $shopId]);

        return new Collection($result);
    }

    /**
     * 查询商品分类详情.
     *
     * @param $categoryId
     *
     * @return Collection
     */
    public function getCategory($categoryId)
    {
        $result = $this->parseJSON('eleme.product.category.getCategory', ['categoryId' => $categoryId]);

        return new Collection($result);
    }

    /**
     * 查询商品分类详情，包含二级分类.
     *
     * @param $categoryId
     *
     * @return Collection
     */
    public function getCategoryWithChildren($categoryId)
    {
        $result = $this->parseJSON('eleme.product.category.getCategoryWithChildren', ['categoryId' => $categoryId]);

        return new Collection($result);
    }

    /**
     * 添加商品分类.
     *
     * @param $params
     *
     * @return Collection
     */
    public function createCategory($params)
    {
        $result = $this->parseJSON('eleme.product.category.createCategory', $params);

        return new Collection($result);
    }

    /**
     * 添加商品分类，支持二级分类.
     *
     * @param $params
     *
     * @return Collection
     */
    public function createCategoryWithChildren($params)
    {
        $result = $this->parseJSON('eleme.product.category.createCategoryWithChildren', $params);

        return new Collection($result);
    }

    /**
     * 更新商品分类.
     *
     * @param $params
     *
     * @return Collection
     */
    public function updateCategory($params)
    {
        $result = $this->parseJSON('eleme.product.category.updateCategory', $params);

        return new Collection($result);
    }

    /**
     * 更新商品分类，包含二级分类.
     *
     * @param $params
     *
     * @return Collection
     */
    public function updateCategoryWithChildren($params)
    {
        $result = $this->parseJSON('eleme.product.category.updateCategoryWithChildren', $params);

        return new Collection($result);
    }

    /**
     * 删除商品分类.
     *
     * @param $categoryId
     *
     * @return Collection
     */
    public function removeCategory($categoryId)
    {
        $result = $this->parseJSON('eleme.product.category.removeCategory', ['categoryId' => $categoryId]);

        return new Collection($result);
    }

    /**
     * 设置分类排序.
     *
     * @param $params
     *
     * @return Collection
     */
    public function setCategoryPositions($params)
    {
        $result = $this->parseJSON('eleme.product.category.setCategoryPositions', $params);

        return new Collection($result);
    }

    /**
     * 设置二级分类排序.
     *
     * @param $params
     *
     * @return Collection
     */
    public function setCategoryPositionsWithChildren($params)
    {
        $result = $this->parseJSON('eleme.product.category.setCategoryPositionsWithChildren', $params);

        return new Collection($result);
    }

    /**
     * 查询商品后台类目.
     *
     * @param $shopId
     *
     * @return Collection
     */
    public function getBackCategory($shopId)
    {
        $result = $this->parseJSON('eleme.product.category.getBackCategory', ['shopId' => $shopId]);

        return new Collection($result);
    }

    /**
     * 上传图片，返回图片的hash值
     *
     * @param $image
     *
     * @return Collection
     */
    public function uploadImage($image)
    {
        $result = $this->parseJSON('eleme.file.uploadImage', ['image' => $image]);

        return new Collection($result);
    }

    /**
     * 通过远程URL上传图片，返回图片的hash值
     *
     * @param $url
     *
     * @return Collection
     */
    public function uploadImageWithRemoteUrl($url)
    {
        $result = $this->parseJSON('eleme.file.uploadImageWithRemoteUrl', ['url' => $url]);

        return new Collection($result);
    }

    /**
     * 获取上传文件的访问URL，返回文件的Url地址
     *
     * @param $hash
     *
     * @return Collection
     */
    public function getUploadedUrl($hash)
    {
        $result = $this->parseJSON('eleme.file.getUploadedUrl', ['hash' => $hash]);

        return new Collection($result);
    }

    /**
     * 获取一个分类下的所有商品
     *
     * @param $categoryId
     *
     * @return Collection
     */
    public function getItemsByCategoryId($categoryId)
    {
        $result = $this->parseJSON('eleme.product.item.getItemsByCategoryId', ['categoryId' => $categoryId]);

        return new Collection($result);
    }

    /**
     * 查询商品详情.
     *
     * @param $itemId
     *
     * @return Collection
     */
    public function getItem($itemId)
    {
        $result = $this->parseJSON('eleme.product.item.getItem', ['itemId' => $itemId]);

        return new Collection($result);
    }

    /**
     * 批量查询商品详情.
     *
     * @param $itemIds
     *
     * @return Collection
     */
    public function batchGetItems($itemIds)
    {
        $result = $this->parseJSON('eleme.product.item.batchGetItems', ['itemIds' => $itemIds]);

        return new Collection($result);
    }

    /**
     * 添加商品
     *
     * @param $params
     *
     * @return Collection
     */
    public function createItem($params)
    {
        $result = $this->parseJSON('eleme.product.item.createItem', $params);

        return new Collection($result);
    }

    /**
     * 批量添加商品
     *
     * @param $params
     *
     * @return Collection
     */
    public function batchCreateItems($params)
    {
        $result = $this->parseJSON('eleme.product.item.batchCreateItems', $params);

        return new Collection($result);
    }

    /**
     * 更新商品
     *
     * @param $params
     *
     * @return Collection
     */
    public function updateItem($params)
    {
        $result = $this->parseJSON('eleme.product.item.updateItem', $params);

        return new Collection($result);
    }

    /**
     * 批量置满库存.
     *
     * @param $specIds
     *
     * @return Collection
     */
    public function batchFillStock($specIds)
    {
        $result = $this->parseJSON('eleme.product.item.batchFillStock', ['specIds' => $specIds]);

        return new Collection($result);
    }

    /**
     * 批量沽清库存.
     *
     * @param $specIds
     *
     * @return Collection
     */
    public function batchClearStock($specIds)
    {
        $result = $this->parseJSON('eleme.product.item.batchClearStock', ['specIds' => $specIds]);

        return new Collection($result);
    }

    /**
     * 批量上架商品.
     *
     * @param $specIds
     *
     * @return Collection
     */
    public function batchOnShelf($specIds)
    {
        $result = $this->parseJSON('eleme.product.item.batchOnShelf', ['specIds' => $specIds]);

        return new Collection($result);
    }

    /**
     * 批量下架商品.
     *
     * @param $specIds
     *
     * @return Collection
     */
    public function batchOffShelf($specIds)
    {
        $result = $this->parseJSON('eleme.product.item.batchOffShelf', ['specIds' => $specIds]);

        return new Collection($result);
    }

    /**
     * 删除商品.
     *
     * @param $itemId
     *
     * @return Collection
     */
    public function removeItem($itemId)
    {
        $result = $this->parseJSON('eleme.product.item.removeItem', ['itemId' => $itemId]);

        return new Collection($result);
    }

    /**
     * 批量删除商品.
     *
     * @param $itemIds
     *
     * @return Collection
     */
    public function batchRemoveItems($itemIds)
    {
        $result = $this->parseJSON('eleme.product.item.batchRemoveItems', ['itemIds' => $itemIds]);

        return new Collection($result);
    }

    /**
     * 批量更新商品库存.
     *
     * @param $params
     *
     * @return Collection
     */
    public function batchUpdateSpecStocks($params)
    {
        $result = $this->parseJSON('eleme.product.item.batchUpdateSpecStocks', $params);

        return new Collection($result);
    }

    /**
     * 设置商品排序.
     *
     * @param $params
     *
     * @return Collection
     */
    public function setItemPositions($params)
    {
        $result = $this->parseJSON('eleme.product.item.setItemPositions', $params);

        return new Collection($result);
    }

    /**
     * 批量沽清库存并在次日2:00开始置满.
     *
     * @param $clearStocks
     *
     * @return Collection
     */
    public function clearAndTimingMaxStock($clearStocks)
    {
        $result = $this->parseJSON('eleme.product.item.clearAndTimingMaxStock', ['clearStocks' => $clearStocks]);

        return new Collection($result);
    }

    /**
     * 设置商品排序.
     *
     * @param $params
     *
     * @return Collection
     */
    public function getItemByShopIdAndExtendCode($params)
    {
        $result = $this->parseJSON('eleme.product.item.getItemByShopIdAndExtendCode', $params);

        return new Collection($result);
    }

    /**
     * 根据商品条形码获取商品.
     *
     * @param $params
     *
     * @return Collection
     */
    public function getItemsByShopIdAndBarCode($params)
    {
        $result = $this->parseJSON('eleme.product.item.getItemsByShopIdAndBarCode', $params);

        return new Collection($result);
    }

    /**
     * 批量修改商品价格.
     *
     * @param $params
     *
     * @return Collection
     */
    public function batchUpdatePrices($params)
    {
        $result = $this->parseJSON('eleme.product.item.batchUpdatePrices', $params);

        return new Collection($result);
    }
}
