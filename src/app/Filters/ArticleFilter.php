<?php


namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

class ArticleFilter extends Filter
{
    public function name(Builder $query) : Builder {
        return $query->where('name', 'LIKE', '%'.request('name').'%')
            ->orWhere('summary', 'LIKE', '%'.request('name').'%');
    }

    public function contributor(Builder $query) : Builder {
        return $query->whereHas('users', function ($q) {
            $q->where('users.name','LIKE','%'.request('contributor').'%');
        });
    }

    public function date(Builder $query) : Builder {
        $dates = explode('-',request('date'));
        $date_min = date('Y-m-d H:i:s', strtotime($dates[0]));
        $date_max = date('Y-m-d H:i:s', strtotime($dates[1]));
        return $query->whereBetween('created_at', [$date_min, $date_max]);
    }

    public function categories(Builder $query) : Builder {
        if (request('category') == '') {
            return $query;
        }
        return $query->where('categories', 'LIKE', '%'.request('category').'%');
    }

    public function tags(Builder $query) : Builder {
        if (request('tag') == '') {
            return $query;
        }
        return $query->where('tags', 'LIKE', '%'.request('tag').'%');
    }
}
