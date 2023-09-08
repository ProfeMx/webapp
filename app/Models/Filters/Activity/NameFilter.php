<?php

namespace App\Models\Filters\Activity;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class NameFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->name) {

            $query->where('name', 'like', '%' . $data->name . '%');

        }

        $query = Order::orderBy($query, $data, 'name');

        return $query;

    }

}
