<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix;

use Imgix\UrlBuilder;

/**
 * Class Imgix
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Imgix
 */
class Imgix
{
    /**
     * The imgix url builder instance.
     *
     * @var \Imgix\UrlBuilder
     */
    protected static $urlBuilder;

    /**
     * Create a new imgix instance.
     *
     * @param \Imgix\UrlBuilder $urlBuilder
     */
    public function __construct(UrlBuilder $urlBuilder)
    {
        self::$urlBuilder = $urlBuilder;
    }

    /**
     * Create an imgix url for the given path.
     *
     * @param string $path
     * @param array $params
     *
     * @return string
     */
    public static function createUrl(string $path, array $params = []): string
    {
        return self::$urlBuilder->createURL($path, $params);
    }
}
