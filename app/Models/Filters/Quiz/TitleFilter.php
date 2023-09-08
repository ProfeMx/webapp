<?php

namespace App\Models\Filters\Quiz;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class TitleFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->title) {

            $query->where('title', $data->title);

        }

        $query = Order::orderBy($query, $data, 'title');

        return $query;

    }

}
