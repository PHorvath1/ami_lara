<?php


namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

class ArticleFilter extends Filter
{
    public function name(Builder $query) : Builder {
        return $query->where('name', 'LIKE', '%'.request('name').'%')
            ->orWhere('summary', 'LIKE', '%'.request('name').'%');
    }

    public function author(Builder $query) : Builder {
        return $query->whereHas('users', function ($q) {
            $q->where('users.name','LIKE','%'.request('author').'%');
        });
    }

    public function date(Builder $query) : Builder {
        $dates = explode('-',request('date'));
        return $query->where('created_at', '>=', $dates[0])
            ->where('created_at', '<=', $dates[1]);
    }

    public function categories(Builder $query) : Builder {
        if (empty(request('category'))) {
            return $query;
        }
        return $query->where('categories', 'LIKE', '%'.request('category').'%');
    }
}

