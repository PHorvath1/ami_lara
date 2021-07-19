<?php


namespace App\Filters;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

abstract class Filter
{
    public function __construct(public Builder $builder) {}


    public function through(...$filters): Filter
    {
        foreach ($filters as $filter) {
            if (request()->has($filter)) {
                $this->builder = $this->$filter($this->builder);
            }
        }
        return $this;
    }

    public function and($class): Filter{
        return new $class($this->builder);
    }

    public function get(): array|Collection
    {
        return $this->builder->get();
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): LengthAwarePaginator
    {
        return $this->builder->paginate($perPage, $columns, $pageName, $page);
    }

    //protected abstract function define();
}
