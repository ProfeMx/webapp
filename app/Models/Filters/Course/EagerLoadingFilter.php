<?php

namespace App\Models\Filters\Course;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_metas == 1 || $data->load_metas == true) {

            $query->with(['metas']);

        }

        if ($data->load_paths == 1 || $data->load_paths == true) {

            $query->with(['paths']);

        }

        if ($data->load_enrollments == 1 || $data->load_enrollments == true) {

            $query->with(['enrollments']);

        }

        if ($data->load_sections == 1 || $data->load_sections == true) {

            $query->with(['sections']);

        }

        if ($data->load_forums == 1 || $data->load_forums == true) {

            $query->with(['forums']);

        }
        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
