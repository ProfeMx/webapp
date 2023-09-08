<?php

namespace App\Models\Filters\ThreadReply;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;
use Innoboxrr\SearchSurge\Search\Utils\UpdatedFilterQuery;

class UpdatedFilter
{

    public static function apply(Builder $query, $data)
    {

        $query = UpdatedFilterQuery::sort($query, $data);

        $query = Order::orderBy($query, $data, 'updated_at');

        return $query;

    }

}
