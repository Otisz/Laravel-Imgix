<?php
/**
 * Developed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Imgix\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Imgix
 *
 * @package Otisz\Imgix\Facades
 *
 * @method static string createUrl(string $path, array $params = [])
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
