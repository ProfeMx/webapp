<?php

namespace App\Models\Filters\User;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EmailFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->email) {

            $query->where('email', 'like', '%' . $data->email . '%');

        }

        $query = Order::orderBy($query, $data, 'email');

        return $query;

    }

}
