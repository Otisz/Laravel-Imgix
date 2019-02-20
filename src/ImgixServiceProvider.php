<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 * @author Levente Otta <leventeotta@gmail.com>
 * Copyright (c) 2019. All rights reserved.
 */

namespace Otisz\Imgix;

use Illuminate\Support\ServiceProvider;
use Imgix\ShardStrategy;
use Imgix\UrlBuilder;

/**
 * Class ImgixServiceProvider
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Imgix
 */
class ImgixServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/imgix.php' => config_path('imgix.php'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/imgix.php', 'imgix');

        $this->app->singleton(UrlBuilder::class, function () {
            return $this->imgixUrlBuilder();
        });

        $this->app->singleton(Imgix::class, function ($app) {
            return new Imgix($app[UrlBuilder::class]);
        });

        $this->app->alias(Imgix::class, 'imgix');
    }

    /**
     * Create a new imgix instance.
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @return \Imgix\UrlBuilder
     */
    private function imgixUrlBuilder(): UrlBuilder
    {
        return new UrlBuilder(
            array_filter(config('imgix.domains')),
            config('imgix.useHttps', false),
            config('imgix.signKey', ''),
            config('imgix.shardStrategy', ShardStrategy::CRC),
            config('imgix.includeLibraryParam', true)
        );
    }
}
