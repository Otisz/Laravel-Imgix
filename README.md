# Laravel Imgix

[![Latest Version on Packagist][shield-packagist]][link-packagist]
[![Software License][shield-license]](LICENSE.md)
[![Build Status][shield-travis]][link-travis]
[![Total Downloads][shield-downloads]][link-packagist]

Laravel package for generating [Imgix](https://www.imgix.com) URLs for your images.

## Dependencies

- [PHP](https://secure.php.net): ^7.1
- [imgix/imgix-php](https://github.com/imgix/imgix-php): ^3.1
- [illuminate/support](https://github.com/illuminate/support): ^5.5

## Install

You can install the package via [Composer](https://getcomposer.org/)
```bash
$ composer require otisz/laravel-imgix
```

In Laravel 5.5 or above the service provider will automatically get registered. In older versions of the framework just add the service provider in `config/app.php` file:
```php
'providers' => [
    ...
    Otisz\Imgix\ImgixServiceProvider::class,
    ...
],

'aliases' => [
    ...
    'Imgix' =>  Otisz\Imgix\Facades\Imgix::class,
    ...
],
```

You can publish the config file with:
```bash
$ php artisan vendor:publish --provider="Otisz\Imgix\ImgixServiceProvider" --tag=config
```

When published, [the `config/imgix.php` config](config/imgix.php) file contains:

```php
<?php

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
    'domain' => env('IMGIX_DOMAIN', 'example.imgix.net'),

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
```
    
## Usage

**Read more about [srcset](https://github.com/imgix/imgix-php#srcset-generation).**

`$path`: The path of the image \
`$params`: The parameters provided by [Imgix](https://docs.imgix.com/apis/url)

### Facade

```php
\Imgix::createUrl('bridge.png', ['w' => 100, 'h' => 100]);

\Imgix::createSrcSet('bridge.png', ['w' => 100, 'h' => 100]);
```

### Helper

```php
imgix('bridge.png', ['w' => 100, 'h' => 100])

imgixSrcSet('bridge.png', ['w' => 100, 'h' => 100])
```
    
## Testing

``` bash
$ composer test
```

## Contributing

### Security Vulnerabilities

If you discover any security-related issues, please email [leventeotta@gmail.com](mailto:leventeotta@gmail.com) instead of using the issue tracker. All security vulnerabilities will be promptly addressed.

## Licence

The Laravel Imgix package is open-source software licensed under the [MIT license](LICENSE.md).

[shield-packagist]: https://img.shields.io/packagist/v/otisz/laravel-imgix.svg?style=flat-square
[shield-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[shield-travis]: https://img.shields.io/travis/Otisz/Laravel-Imgix.svg?style=flat-square
[shield-downloads]: https://img.shields.io/packagist/dt/otisz/laravel-imgix.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/otisz/laravel-imgix
[link-travis]: https://travis-ci.org/Otisz/Laravel-Imgix
