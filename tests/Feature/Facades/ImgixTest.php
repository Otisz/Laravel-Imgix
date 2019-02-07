<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 * @author Levente Otta <leventeotta@gmail.com>
 * Copyright (c) 2019. All rights reserved.
 */

namespace Otisz\Laravel\Imgix\Tests\Feature\Facades;

use Otisz\Laravel\Imgix\Facades\Imgix as ImgixFacade;
use Otisz\Laravel\Imgix\Imgix;
use Otisz\Laravel\Imgix\Tests\Feature\TestCase;

/**
 * Class ImgixTest
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Laravel\Imgix\Tests\Feature\Facades
 */
class ImgixTest extends TestCase
{
    /** @test */
    public function it_provides_facade()
    {
        $this->assertInstanceOf(Imgix::class, ImgixFacade::getFacadeRoot());
    }
}
