<?php
/**
 * Developed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix\Tests\Feature\Facades;

use Otisz\Imgix\Facades\Imgix as ImgixFacade;
use Otisz\Imgix\Imgix;
use Otisz\Imgix\Tests\Feature\TestCase;

/**
 * Class ImgixTest
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Imgix\Tests\Feature\Facades
 */
class ImgixTest extends TestCase
{
    /** @test */
    public function it_provides_facade(): void
    {
        $this->assertInstanceOf(Imgix::class, ImgixFacade::getFacadeRoot());
    }
}
