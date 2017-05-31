<?php

namespace Laraver\Waimai\Tests;

use Dotenv\Dotenv;
use Laraver\Waimai\Eleme\Eleme;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    /**
     * @var Eleme
     */
    protected $eleme;

    /**
     * @test
     */
    public function __construct()
    {
        parent::__construct();

        $env = new Dotenv(__DIR__.'/../');
        $env->load();

        $this->eleme = new Eleme([
            'app_id' => getenv('ELEME_APP_ID'),
            'secret' => getenv('ELEME_SECRET'),
            'debug'  => true,
        ]);
    }
}
