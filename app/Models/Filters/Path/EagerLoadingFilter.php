<?php

namespace App\Models\Filters\Path;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_courses == 1 || $data->load_courses == true) {

            $query->with(['courses']);

        }

        if ($data->load_paths == 1 || $data->load_paths == true) {

            $query->with(['paths']);

        }
        
        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
