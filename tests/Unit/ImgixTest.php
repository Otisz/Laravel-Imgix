<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix\Tests\Unit;

use Imgix\UrlBuilder;
use Mockery;
use Otisz\Imgix\Imgix;
use PHPUnit\Framework\TestCase;

/**
 * Class ImgixTest
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Imgix\Tests\Unit
 */
class ImgixTest extends TestCase
{
    /**
     * @var \Imgix\UrlBuilder|\Mockery\Mock
     */
    protected $urlBuilder;

    /**
     * @var \Otisz\Imgix\Imgix
     */
    protected $imgix;

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        $this->urlBuilder = Mockery::mock(UrlBuilder::class);
        $this->imgix = new Imgix($this->urlBuilder);
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

    /**
     * This method is called after each test.
     */
    protected function tearDown(): void
    {
        Mockery::close();
    }
}
