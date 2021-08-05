<?php


namespace App\Traits;


use Closure;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * @property string id
 * @property DateTime created_at
 * @property DateTime updated_at
 * @method static Model|null first()
 * @method static Model|null find(int|string $id)
 * @method static int count()
 * @method static Builder latest()
 * @method static Builder inRandomOrder()
 * @method static Model create(array $validated)
 * @method static Builder where(string $field, mixed $operatorOrEqualsValue, mixed $value = null)
 * @method static Builder whereNotNull(string $field)
 * @method static Builder whereHas(string $connection, Closure $param)
 * @method static LengthAwarePaginator paginate(int $perPage)
 */

trait ApiResource
{
    use Filters;

    public static function latestOne(): Model
    {
        return self::latest()->first();
    }

    public static function random(): Model
    {
        return self::inRandomOrder()->first();
    }

    public static function sample(int $number): Collection{
        return self::inRandomOrder()->limit($number)->get();
    }
}
