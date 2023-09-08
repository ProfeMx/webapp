<?php

namespace App\Models\Filters\Resource;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class StatusFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->status) {

            $query->where('status', $data->status);

        }

        $query = Order::orderBy($query, $data, 'status');

        return $query;

    }

}
