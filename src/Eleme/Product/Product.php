<?php

namespace Laraver\Waimai\Eleme\Product;

use Illuminate\Support\Collection;
use Laraver\Waimai\Eleme\Core\Api;

class Product extends Api
{
    /**
     * 查询店铺商品分类
     *
     * @param $shopId
     * @return Collection
     */
    public function getShopCategories($shopId)
    {
        $result = $this->parseJSON('eleme.product.category.getShopCategories', ['shopId' => $shopId]);

        return new Collection($result);
    }

    /**
     * 查询店铺商品分类，包含二级分类
     *
     * @param $shopId
     * @return Collection
     */
    public function getShopCategoriesWithChildren($shopId)
    {
        $result = $this->parseJSON('eleme.product.category.getShopCategoriesWithChildren', ['shopId' => $shopId]);

        return new Collection($result);
    }

    /**
     * 查询商品分类详情
     *
     * @param $categoryId
     * @return Collection
     */
    public function getCategory($categoryId)
    {
        $result = $this->parseJSON('eleme.product.category.getCategory', ['categoryId' => $categoryId]);

        return new Collection($result);
    }

    /**
     * 查询商品分类详情，包含二级分类
     *
     * @param $categoryId
     * @return Collection
     */
    public function getCategoryWithChildren($categoryId)
    {
        $result = $this->parseJSON('eleme.product.category.getCategoryWithChildren', ['categoryId' => $categoryId]);

        return new Collection($result);
    }

    /**
     * 添加商品分类
     *
     * @param $params
     * @return Collection
     */
    public function createCategory($params)
    {
        $result = $this->parseJSON('eleme.product.category.createCategory', $params);

        return new Collection($result);
    }

    /**
     * 添加商品分类，支持二级分类
     *
     * @param $params
     * @return Collection
     */
    public function createCategoryWithChildren($params)
    {
        $result = $this->parseJSON('eleme.product.category.createCategoryWithChildren', $params);

        return new Collection($result);
    }

    /**
     * 更新商品分类
     *
     * @param $params
     * @return Collection
     */
    public function updateCategory($params)
    {
        $result = $this->parseJSON('eleme.product.category.updateCategory', $params);

        return new Collection($result);
    }

    /**
     * 更新商品分类，包含二级分类
     *
     * @param $params
     * @return Collection
     */
    public function updateCategoryWithChildren($params)
    {
        $result = $this->parseJSON('eleme.product.category.updateCategoryWithChildren', $params);

        return new Collection($result);
    }

    /**
     * 删除商品分类
     *
     * @param $categoryId
     * @return Collection
     */
    public function removeCategory($categoryId)
    {
        $result = $this->parseJSON('eleme.product.category.removeCategory', ['categoryId' => $categoryId]);

        return new Collection($result);
    }

    /**
     * 设置分类排序
     *
     * @param $params
     * @return Collection
     */
    public function setCategoryPositions($params)
    {
        $result = $this->parseJSON('eleme.product.category.setCategoryPositions', $params);

        return new Collection($result);
    }

    /**
     * 设置二级分类排序
     *
     * @param $params
     * @return Collection
     */
    public function setCategoryPositionsWithChildren($params)
    {
        $result = $this->parseJSON('eleme.product.category.setCategoryPositionsWithChildren', $params);

        return new Collection($result);
    }

    /**
     * 查询商品后台类目
     *
     * @param $shopId
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
     * @return Collection
     */
    public function getItemsByCategoryId($categoryId)
    {
        $result = $this->parseJSON('eleme.product.item.getItemsByCategoryId', ['categoryId' => $categoryId]);

        return new Collection($result);
    }

    /**
     * 查询商品详情
     *
     * @param $itemId
     * @return Collection
     */
    public function getItem($itemId)
    {
        $result = $this->parseJSON('eleme.product.item.getItem', ['itemId' => $itemId]);

        return new Collection($result);
    }

    /**
     * 批量查询商品详情
     *
     * @param $itemIds
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
     * @return Collection
     */
    public function createItem($params)
    {
        $result = $this->parseJSON('eleme.product.item.createItem', $params);

        return new Collection($result);
    }
}
