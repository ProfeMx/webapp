<?php

namespace App\Models\Filters\EnrollmentLog;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class IdFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->id) {

            $query->where('id', $data->id);

        }

        $query = Order::orderBy($query, $data, 'id');

        return $query;

    }

}
