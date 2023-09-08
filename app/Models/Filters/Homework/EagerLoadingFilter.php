<?php

namespace App\Models\Filters\Homework;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_activity == 1 || $data->load_activity == true) {

            $query->with(['activity']);

        }

        if ($data->load_submissions == 1 || $data->load_submissions == true) {

            $query->with(['submissions']);

        }
        
        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
