<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Imgix\ShardStrategy;
use Imgix\UrlBuilder;
use Otisz\Imgix\Imgix;

/**
 * Class ServiceProvider
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Imgix\Providers
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        $configPath = __DIR__ . '/../../config/imgix.php';

        $this->publishes([$configPath => config_path('imgix.php')], 'imgix');

        $this->mergeConfigFrom($configPath, 'imgix');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(Imgix::class, function () {
            $imgixUrlBuilder = new UrlBuilder(
                array_filter(config('imgix.domains')),
                config('imgix.useHttps', false),
                config('imgix.signKey', ''),
                config('imgix.shardStrategy', ShardStrategy::CRC),
                config('imgix.includeLibraryParam', true)
            );

            return new Imgix($imgixUrlBuilder);
        });

        $this->app->alias(Imgix::class, 'imgix');
    }
}
