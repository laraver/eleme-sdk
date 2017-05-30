<?php

namespace Laraver\Waimai\Tests;

class ElemeTest extends BaseTest
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @test
     */
    public function testToken()
    {
        echo $token = $this->eleme->access_token->getToken(true);
        $this->assertNotNull($this->eleme->access_token->getToken());

        return $token;
    }

    /**
     * @test
     */
    public function testGetShopCategories()
    {
        print_r($this->eleme->product->getShopCategories(getenv('ELEME_SHOP_ID')));
    }
}
