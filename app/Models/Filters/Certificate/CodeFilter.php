<?php

namespace App\Models\Filters\Certificate;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class CodeFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->code) {

            $query->where('code', $data->code);

        }

        $query = Order::orderBy($query, $data, 'code');

        return $query;

    }

}
