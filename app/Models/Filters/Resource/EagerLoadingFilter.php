<?php

namespace App\Models\Filters\Resource;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_lesson == 1 || $data->load_lesson == true) {

            $query->with(['lesson']);

        }

        if ($data->load_resourceable == 1 || $data->load_resourceable == true) {

            $query->with(['resourceable']);

        }
        
        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
