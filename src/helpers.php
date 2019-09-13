<?php
/**
 * Developed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

if (!function_exists('imgix')) {
    /**
     * Generate an ImgIX url for the given path.
     *
     * @param  string  $path
     * @param  array  $params
     *
     * @return string
     */
    function imgix($path, array $params = [])
    {
        return app('imgix')->createUrl($path, $params);
    }
}

if (!function_exists('imgixSrcSet')) {
    /**
     * Generate an ImgIX src set for the given path.
     *
     * @param  string  $path
     * @param  array  $params
     *
     * @return string
     */
    function imgixSrcSet($path, array $params = [])
    {
        return app('imgix')->imgixSrcSet($path, $params);
    }
}
