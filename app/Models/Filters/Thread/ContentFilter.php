<?php

namespace App\Models\Filters\Thread;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class ContentFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->content) {

            $query->where('content', 'like', '%' . $data->content . '%');

        }

        $query = Order::orderBy($query, $data, 'content');

        return $query;

    }

}
