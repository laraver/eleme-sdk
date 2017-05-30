<?php

namespace Laraver\Waimai\Eleme\Product;

use Illuminate\Support\Collection;
use Laraver\Waimai\Eleme\Core\Api;

class Product extends Api
{
    public function getShopCategories($shopId)
    {
        $result = $this->parseJSON('eleme.product.category.getShopCategories', ['shopId' => $shopId]);

        return new Collection($result);
    }
}
