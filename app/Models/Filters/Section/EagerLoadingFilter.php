<?php

namespace App\Models\Filters\Section;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_lessons == 1 || $data->load_lessons == true) {

            $query->with(['lessons']);

        }

        if ($data->load_course == 1 || $data->load_course == true) {

            $query->with(['course']);

        }
        
        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
