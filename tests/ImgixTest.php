<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix\Tests;

use Imgix\UrlBuilder;
use Mockery;
use Otisz\Imgix\ImgixBuilder;

class ImgixTest extends TestCase
{
    /**
     * @var \Imgix\UrlBuilder|\Mockery\Mock
     */
    protected $urlBuilder;

    /**
     * @var \Otisz\Imgix\ImgixBuilder
     */
    protected $imgix;

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        $this->urlBuilder = Mockery::mock(UrlBuilder::class);
        $this->imgix = new ImgixBuilder($this->urlBuilder);
    }

    /** @test */
    public function it_creates_url(): void
    {
        $expectedArgs = [
            $path = 'bridge.png',
            $params = ['w' => 100, 'h' => 100],
        ];
        $expectedReturn = 'http://example.imgix.net/bridge.png?h=100&w=100';
        $this->urlBuilder
            ->shouldReceive('createURL')
            ->withArgs($expectedArgs)
            ->once()
            ->andReturn($expectedReturn);
        $response = $this->imgix->createUrl($path, $params);
        $this->assertEquals($expectedReturn, $response);
    }


    public function it_creates_src_set(): void
    {

        $expectedArgs = [
            $path = 'bridge.png',
        ];
        $expectedReturn = 'http://example.imgix.net/bridge.png';
        $this->urlBuilder
            ->shouldReceive('createSrcSet')
            ->withArgs($expectedArgs)
            ->once()
            ->andReturn($expectedReturn);
        $response = $this->imgix->createSrcSet($path);
        $this->assertEquals($expectedReturn, $response);

        $expectedArgs = [
            $path = 'bridge.png',
            $params = ['h' => 800, 'ar' => '3:2', 'fit' => 'crop'],
        ];
        $expectedReturn = 'http://example.imgix.net/bridge.png?ar=3%3A2&dpr=1&fit=crop&h=800';
        $this->urlBuilder
            ->shouldReceive('createSrcSet')
            ->withArgs($expectedArgs)
            ->once()
            ->andReturn($expectedReturn);
        $response = $this->imgix->createSrcSet($path, $params);
        $this->assertEquals($expectedReturn, $response);
    }

    /**
     * This method is called after each test.
     */
    protected function tearDown(): void
    {
        Mockery::close();
    }
}
