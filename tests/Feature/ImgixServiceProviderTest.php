<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 * @author Levente Otta <leventeotta@gmail.com>
 * Copyright (c) 2019. All rights reserved.
 */

namespace Otisz\Laravel\Imgix\Tests\Feature;

use Imgix\UrlBuilder;
use Otisz\Laravel\Imgix\Imgix;

/**
 * Class ImgixServiceProviderTest
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Laravel\Imgix\Tests\Feature
 */
class ImgixServiceProviderTest extends TestCase
{
    /** @test */
    public function it_boots()
    {
        $config = include dirname(__DIR__) . '/../config/imgix.php';
        $this->assertEquals($config, $this->app['config']['imgix']);
    }

    /** @test */
    public function it_registers()
    {
        $this->assertTrue($this->app->bound(UrlBuilder::class));
        $this->assertInstanceOf(UrlBuilder::class, $this->app->make(UrlBuilder::class));
        $this->assertTrue($this->app->bound(Imgix::class));
        $this->assertInstanceOf(Imgix::class, $this->app->make(Imgix::class));
        $this->assertInstanceOf(Imgix::class, $this->app->make('imgix'));
    }
}
