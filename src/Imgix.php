<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 * @author Levente Otta <leventeotta@gmail.com>
 * Copyright (c) 2019. All rights reserved.
 */

namespace Otisz\Laravel\Imgix;

use Imgix\UrlBuilder;

/**
 * Class Imgix
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Laravel\Imgix
 */
class Imgix
{
    /**
     * The imgix url builder instance.
     *
     * @var \Imgix\UrlBuilder
     */
    protected $urlBuilder;

    /**
     * Create a new imgix instance.
     *
     * @param \Imgix\UrlBuilder $urlBuilder
     */
    public function __construct(UrlBuilder $urlBuilder)
    {
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Create an imgix url for the given path.
     *
     * @param string $path
     * @param array $params
     *
     * @return string
     */
    public function createUrl($path, array $params = []): string
    {
        return $this->urlBuilder->createURL($path, $params);
    }
}
