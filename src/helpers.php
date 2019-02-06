<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 * @author Levente Otta <leventeotta@gmail.com>
 * Copyright (c) 2019. All rights reserved.
 */

if (!function_exists('imgix')) {
    /**
     * Generate an imgix url for the given path.
     *
     * @codeCoverageIgnore
     *
     * @param string $path
     * @param array $params
     *
     * @return string
     */
    function imgix($path, array $params = [])
    {
        return app('imgix')->createUrl($path, $params);
    }
}
