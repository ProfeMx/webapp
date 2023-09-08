<?php

namespace App\Models\Filters\Career;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class DescriptionFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->description) {

            $query->where('description', 'like', '%' . $data->description . '%');

        }

        $query = Order::orderBy($query, $data, 'description');

        return $query;

    }

}
