<?php
/**
 * Developed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix;

use Imgix\UrlBuilder;

class ImgixBuilder
{
    /**
     * The ImgIX url builder instance.
     *
     * @var \Imgix\UrlBuilder $urlBuilder
     */
    protected $urlBuilder;

    /**
     * Create a new imgix instance.
     *
     * @param  \Imgix\UrlBuilder  $urlBuilder
     */
    public function __construct(UrlBuilder $urlBuilder)
    {
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Create an imgix url for the given path.
     *
     * @param  string  $path
     * @param  array  $params
     *
     * @return string
     */
    public function createUrl(string $path, array $params = []): string
    {
        return $this->urlBuilder->createURL($path, $params);
    }

    /**
     * Create an imgix src set for the given path.
     *
     * @param  string  $path
     * @param  array  $params
     *
     * @return bool|string
     */
    public function createSrcSet(string $path, array $params = [])
    {
        return $this->urlBuilder->createSrcSet($path, $params);
    }
}
