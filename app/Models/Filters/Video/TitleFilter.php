<?php

namespace App\Models\Filters\Video;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class TitleFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->title) {

            $query->where('title', 'like', '%' . $data->title . '%');

        }

        $query = Order::orderBy($query, $data, 'title');

        return $query;

    }

}
