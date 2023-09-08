<?php

namespace App\Models\Filters\EnrollmentLog;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EnrollmentFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->enrollment_id) {

            $query->where('enrollment_id', $data->enrollment_id);

        }

        $query = Order::orderBy($query, $data, 'enrollment_id');

        return $query;

    }

}
