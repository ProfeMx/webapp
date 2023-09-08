<?php

namespace App\Models\Filters\Enrollment;

use Illuminate\Database\Eloquent\Builder;
use Innoboxrr\SearchSurge\Search\Utils\Order;

class EagerLoadingFilter
{

    public static function apply(Builder $query, $data)
    {

        if ($data->load_metas == 1 || $data->load_metas == true) {

            $query->with(['metas']);

        }

        if ($data->load_course == 1 || $data->load_course == true) {

            $query->with(['course']);

        }

        if ($data->load_enrollment_logs == 1 || $data->load_enrollment_logs == true) {

            $query->with(['enrollmentLogs']);

        }

        if ($data->load_user == 1 || $data->load_user == true) {

            $query->with(['user']);

        }

        if ($data->load_certificate == 1 || $data->load_certificate == true) {

            $query->with(['certificate']);

        }

        /*

        if ($data->load_relation == 1 || $data->load_relation == true) {

            $query->with(['relation']);

        }

        */

        return $query;

    }

}
