<?php
/**
 * Developed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix\Tests;

use Otisz\Imgix\ImgixBuilder;

class ServiceProviderTest extends TestCase
{
    /** @test */
    public function it_boots(): void
    {
        $config = include dirname(__DIR__).'/config/imgix.php';
        $this->assertEquals($config, $this->app['config']['imgix']);
    }

    /** @test */
    public function it_registers(): void
    {
        $this->assertTrue($this->app->bound('Imgix'));
        $this->assertInstanceOf(ImgixBuilder::class, $this->app->make('imgix'));
    }
}
