<?php

namespace App\Models\Filters\Question;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_metas == 1 || $data->load_metas == true) {

            $query->with(['metas']);

        }

        if ($data->load_quiz == 1 || $data->load_quiz == true) {

            $query->with(['quiz']);

        }

        if ($data->load_answers == 1 || $data->load_answers == true) {

            $query->with(['answers']);

        }
        
        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
