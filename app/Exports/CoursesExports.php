<?php

namespace App\Exports;

use App\Models\Course;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CoursesExports implements FromView
{

    protected $data;

    public function __construct(array $data) 
    {

        $this->data = $data;

    }

    public function view(): View
    {
        return view(
            config(
                'app.excel_view', 
                'app::excel.'
            ) . 'course', 
            [
                'courses' => $this->getQuery(),
                'exportCols' => Course::$exportCols,
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(Course::class, $this->data);

    }

}