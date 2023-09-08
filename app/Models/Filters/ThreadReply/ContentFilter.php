<?php

namespace App\Models\Filters\ThreadReply;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class ContentFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->content) {

            $query->where('content', 'like', '%' . $data->content . '%');

        }

        $query = Order::orderBy($query, $data, 'id');

        return $query;

    }

}
