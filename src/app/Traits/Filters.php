<?php


namespace App\Traits;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pipeline\Pipeline;

/**
 * @method static Builder query()
 */
trait Filters
{
    public static function filterWith($class): Filter{
        return new $class(self::query());
    }
}
