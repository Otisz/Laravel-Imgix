<?php
/**
 * Developed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Imgix\UrlBuilder;

/**
 * Class ImgixServiceProvider
 *
 * @package Otisz\Imgix
 */
class ImgixServiceProvider extends BaseServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        $configPath = __DIR__.'/../config/imgix.php';

        $this->publishes([$configPath => config_path('imgix.php')], 'config');

        $this->mergeConfigFrom($configPath, 'imgix');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('Imgix', static function (Application $app) {
            $config = $app['config']['imgix'];

            $builder = new UrlBuilder(
                $config['domain'],
                $config['useHttps'],
                $config['signKey'],
                $config['includeLibraryParam']
            );

            return new ImgixBuilder($builder);
        });

        $this->app->alias(ImgixBuilder::class, 'imgix');
    }
}
