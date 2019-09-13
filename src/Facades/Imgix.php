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
 * @method static string createUrl(string $path, array $params = [])
 * @method static string createSrcSet(string $path, array $params = [])
 */
class Imgix extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'Imgix';
    }
}
