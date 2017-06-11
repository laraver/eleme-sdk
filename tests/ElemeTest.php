<?php

namespace Laraver\Waimai\Tests;

class ElemeTest extends BaseTest
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProduct()
    {
        $product = \Mockery::mock('Laraver\Waimai\Eleme\Product\Product[parseJSON]', [$this->getMockAccessToken()]);
        $product->shouldReceive('parseJSON')->andReturnUsing();
    }

    public function getMockAccessToken()
    {
        $accessToken = \Mockery::mock('Laraver\Waimai\Eleme\Core\AccessToken[getTokenFromServer]', [[], $this->getMockCache()]);
        $accessToken->shouldReceive('getTokenFromServer')->andReturn('token');

        return $accessToken;
    }

    public function getMockCache()
    {
        return \Mockery::mock('Doctrine\Common\Cache\Cache');
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
        $categories = $this->eleme->product->getShopCategories(getenv('ELEME_SHOP_ID'));

        print_r($categories);

        $this->assertNull($categories['error']);
    }

    /**
     * @test
     */
    public function testGetShopCategoriesWithChildren()
    {
        $categories = $this->eleme->product->getShopCategoriesWithChildren(getenv('ELEME_SHOP_ID'));

        print_r($categories);

        $this->assertNull($categories['error']);
    }

    /**
     * @test
     */
    public function testGetCategory()
    {
        $categories = $this->eleme->product->getCategory('514810881');

        print_r($categories);

        $this->assertNull($categories['error']);
    }

    /**
     * @test
     */
    public function testGetCategoryWithChildren()
    {
        $categories = $this->eleme->product->getCategoryWithChildren('514810881');

        print_r($categories);

        $this->assertNull($categories['error']);
    }

    /**
     * @test
     */
    public function testCreateCategory()
    {
        $category = $this->eleme->product->createCategory([
            'shopId'      => getenv('ELEME_SHOP_ID'),
            'name'        => '小炒类',
            'description' => '这个味，香！',
        ]);

        print_r($category);

        $this->assertNull($category['error']);
    }

    /**
     * @test
     */
    public function testCreateCategoryWithChildren()
    {
        $category = $this->eleme->product->createCategoryWithChildren([
            'shopId'      => getenv('ELEME_SHOP_ID'),
            'name'        => '炒饭类',
            'parentId'    => 524244525,
            'description' => '只有一个扬州炒饭怎么破？',
        ]);

        print_r($category);

        $this->assertNull($category['error']);
    }

    /**
     * @test
     */
    public function testUpdateCategory()
    {
        $category = $this->eleme->product->updateCategory([
            'categoryId'  => 524244525,
            'name'        => '酒水类',
            'description' => '不醉无归',
        ]);

        print_r($category);

        $this->assertNull($category['error']);
    }

    /**
     * @test
     */
    public function testUpdateCategoryWithChildren()
    {
        $category = $this->eleme->product->updateCategoryWithChildren([
            'categoryId'  => 524244525,
            'name'        => '酒水类',
            'parentId'    => 0,
            'description' => '不醉无归',
        ]);

        print_r($category);

        $this->assertNull($category['error']);
    }

    /**
     * @test
     */
    public function testRemoveCategory()
    {
        $category = $this->eleme->product->removeCategory(524244525);

        print_r($category);

        $this->assertNull($category['error']);
    }

    /**
     * @test
     */
    public function testSetCategoryPositions()
    {
        $category = $this->eleme->product->setCategoryPositions([
            'shopId'      => getenv('ELEME_SHOP_ID'),
            'categoryIds' => [
                514810881, 524264475,
            ],
        ]);

        print_r($category);

        $this->assertNull($category['error']);
    }

    /**
     * @test
     */
    public function testSetCategoryPositionsWithChildren()
    {
        $category = $this->eleme->product->setCategoryPositionsWithChildren([
            'shopId'                  => getenv('ELEME_SHOP_ID'),
            'categoryWithChildrenIds' => [
                [
                    'parentId'    => '',
                    'childrenIds' => [

                    ],
                ],
            ],
        ]);

        print_r($category);

        $this->assertNull($category['error']);
    }

    /**
     * @test
     */
    public function testGetBackCategory()
    {
        $category = $this->eleme->product->getBackCategory(getenv('ELEME_SHOP_ID'));

        print_r($category);

        $this->assertNull($category['error']);
    }

    /**
     * @test
     */
    public function testUploadImage()
    {
        $base64 = base64_encode(file_get_contents(__DIR__.'/test.jpg'));

        $file = $this->eleme->product->uploadImage($base64);

        print_r($file);

        $this->assertNull($file['error']);
    }

    /**
     * @test
     */
    public function testUploadImageWithRemoteUrl()
    {
        $file = $this->eleme->product->uploadImageWithRemoteUrl('http://hanc.cc/usr/themes/typecho_material_theme/img/billboard.jpg');

        print_r($file);

        $this->assertNull($file['error']);
    }

    /**
     * @test
     */
    public function testGetUploadedUrl()
    {
        $file = $this->eleme->product->getUploadedUrl('a509751d62520c56779ebd46f6857210jpeg');

        print_r($file);

        $this->assertNull($file['error']);
    }

    /**
     * @test
     */
    public function testGetItemsByCategoryId()
    {
        $items = $this->eleme->product->getItemsByCategoryId('514810881');

        print_r($items);

        $this->assertNull($items['error']);
    }

    /**
     * @test
     */
    public function testGetItem()
    {
        $items = $this->eleme->product->getItem('603131177');

        print_r($items);

        $this->assertNull($items['error']);
    }

    /**
     * @test
     */
    public function testBatchGetItems()
    {
        $items = $this->eleme->product->batchGetItems([
            603131177, 603127965,
        ]);

        print_r($items);

        $this->assertNull($items['error']);
    }

    /**
     * @test
     */
    public function testCreateItem()
    {
        $items = $this->eleme->product->createItem([
            '',
        ]);

        print_r($items);

        $this->assertNull($items['error']);
    }
}
