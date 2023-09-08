<?php

namespace App\Models\Filters\Homework;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class TypeFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->type) {

            $query->where('type', $data->type);

        }

        $query = Order::orderBy($query, $data, 'type');

        return $query;

    }

}
