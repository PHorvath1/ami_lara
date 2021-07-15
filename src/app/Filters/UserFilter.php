<?php


namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

class UserFilter extends Filter
{

    public function name(Builder $query): Builder
    {
        return $query->where('name', 'LIKE', '%' . request('name') . '%');
    }

    public function created_gt(Builder $query): Builder
    {
        return $query->where('created_at', '>', request('created_gt'));
    }
}
