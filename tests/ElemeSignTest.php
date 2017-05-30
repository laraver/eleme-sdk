<?php

namespace Laraver\Waimai\Tests;

use Laraver\Waimai\Eleme\Eleme;
use PHPUnit\Framework\TestCase;

class ElemeSignTest extends TestCase
{

    /**
     * @test
     */
    public function testSign()
    {
        $eleme = new Eleme([
            'app_id' => '',
            'secret' => '',
            'debug' => true,
        ]);

        echo $eleme->access_token->getToken();
    }

}
