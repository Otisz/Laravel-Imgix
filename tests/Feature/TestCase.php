<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix\Tests\Feature;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Otisz\Imgix\Imgix;
use Otisz\Imgix\ImgixServiceProvider;

/**
 * Class TestCase
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Imgix\Tests\Feature
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
