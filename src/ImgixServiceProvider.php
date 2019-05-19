<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Imgix\UrlBuilder;

/**
 * Class ImgixServiceProvider
 *
 * @author Levente Otta <leventeotta@gmail.com>
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
        $configPath = __DIR__ . '/../config/imgix.php';

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
        $this->app->singleton(Imgix::class, static function () {
            $builder = new UrlBuilder(
                config('imgix.domain'),
                config('imgix.useHttps', false),
                config('imgix.signKey', ''),
                config('imgix.includeLibraryParam', true)
            );

            return new Imgix($builder);
        });

        $this->app->alias(Imgix::class, 'imgix');
    }
}
