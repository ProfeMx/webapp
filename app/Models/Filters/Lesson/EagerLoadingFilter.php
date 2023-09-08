<?php

namespace App\Models\Filters\Lesson;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_metas == 1 || $data->load_metas == true) {

            $query->with(['metas']);

        }

        if ($data->load_activities == 1 || $data->load_activities == true) {

            $query->with(['activities']);

        }

        if ($data->load_resources == 1 || $data->load_resources == true) {

            $query->with(['resources']);

        }

        if ($data->load_enrollment_logs == 1 || $data->load_enrollment_logs == true) {

            $query->with(['enrollmentLogs']);

        }

        if ($data->load_sections == 1 || $data->load_sections == true) {

            $query->with(['sections']);

        }

        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
