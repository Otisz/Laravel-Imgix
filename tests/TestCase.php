<?php
/**
 * Developed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Otisz\Imgix\Facades\Imgix;
use Otisz\Imgix\ImgixServiceProvider;

abstract class TestCase extends BaseTestCase
{
    /**
     * @param  \Illuminate\Foundation\Application  $app
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
     * @param  \Illuminate\Foundation\Application  $app
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
