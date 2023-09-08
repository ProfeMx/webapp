<?php

namespace App\Models\Filters\Certificate;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;
use Innoboxrr\SearchSurge\Search\Utils\CreationFilterQuery;

class CreationFilter
{

    public static function apply(Builder $query, $data)
    {

        $query = CreationFilterQuery::sort($query, $data);

        $query = Order::orderBy($query, $data, 'created_at');

        return $query;

    }

}
