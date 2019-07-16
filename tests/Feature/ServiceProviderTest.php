<?php
/**
 * Developed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix\Tests\Feature;

use Otisz\Imgix\Imgix;

/**
 * Class ServiceProviderTest
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Imgix\Tests\Feature
 */
class ServiceProviderTest extends TestCase
{
    /** @test */
    public function it_boots(): void
    {
        $config = include dirname(__DIR__) . '/../config/imgix.php';
        $this->assertEquals($config, $this->app['config']['imgix']);
    }

    /** @test */
    public function it_registers(): void
    {
        $this->assertTrue($this->app->bound(Imgix::class));
        $this->assertInstanceOf(Imgix::class, $this->app->make(Imgix::class));
        $this->assertInstanceOf(Imgix::class, $this->app->make('imgix'));
    }
}
