<?php
/**
 * Developed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix\Tests;

use Otisz\Imgix\Facades\Imgix;
use Otisz\Imgix\ImgixBuilder;

class FacadeTest extends TestCase
{
    /** @test */
    public function it_provides_facade(): void
    {
        $this->assertInstanceOf(ImgixBuilder::class, Imgix::getFacadeRoot());
    }
}
