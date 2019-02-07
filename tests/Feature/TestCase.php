<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 * @author Levente Otta <leventeotta@gmail.com>
 * Copyright (c) 2019. All rights reserved.
 */

namespace Otisz\Laravel\Imgix\Tests\Feature;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Otisz\Laravel\Imgix\Imgix;
use Otisz\Laravel\Imgix\ImgixServiceProvider;

/**
 * Class TestCase
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Laravel\Imgix\Tests\Feature
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            ImgixServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app): array
    {
        return [
            'Imgix' => Imgix::class,
        ];
    }
}
