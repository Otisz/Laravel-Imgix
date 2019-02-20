<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 * @author Levente Otta <leventeotta@gmail.com>
 * Copyright (c) 2019. All rights reserved.
 */

namespace Otisz\Imgix\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Imgix
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Imgix\Facades
 */
class Imgix extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'imgix';
    }
}
