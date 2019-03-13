<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

return [
    /*
    |--------------------------------------------------------------------------
    | ImgIX Domains
    |--------------------------------------------------------------------------
    |
    | Domain sharding enables you to spread image requests across
    | multiple domains. This allows you to bypass the requests-per-host
    | limits of browsers. We recommend 2-3 domain shards maximum if you are
    | going to use domain sharding.
    |
    | @link https://github.com/imgix/imgix-php#domain-sharded-urls
    |
    */
    'domains' => [
        env('IMGIX_DOMAIN', 'example.imgix.net'),
        env('IMGIX_DOMAIN2'),
        env('IMGIX_DOMAIN3'),
    ],

    /*
    |--------------------------------------------------------------------------
    | ImgIX Domains
    |--------------------------------------------------------------------------
    |
    | By default, shards are calculated using a checksum so that the image
    | path always resolves to the same domain. This improves caching in the
    | browser. However, you can supply a different strategy that cycles
    | through domains instead.
    |
    | Supported: \Imgix\ShardStrategy::CRC, \Imgix\ShardStrategy::CYCLE
    |
    */
    'shardStrategy' => \Imgix\ShardStrategy::CRC,

    /*
    |--------------------------------------------------------------------------
    | ImgIX HTTPS
    |--------------------------------------------------------------------------
    |
    | For HTTPS support.
    |
    */
    'useHttps' => env('IMGIX_HTTPS', false),

    /*
    |--------------------------------------------------------------------------
    | ImgIX Signed URLs
    |--------------------------------------------------------------------------
    |
    | To produce a signed URL, you must enable secure URLs on your source
    | and then provide your signature key to the URL builder.
    |
    | @link https://github.com/imgix/imgix-php#signed-urls
    |
    */
    'signKey' => env('IMGIX_SIGNKEY', ''),

    /*
    |--------------------------------------------------------------------------
    | ImgIX Library Param
    |--------------------------------------------------------------------------
    |
    | For security and diagnostic purposes, we default to signing all requests
    | with the language and version of library used to generate the URL.
    |
    */
    'includeLibraryParam' => env('IMGIX_LIBRARY', true),
];
