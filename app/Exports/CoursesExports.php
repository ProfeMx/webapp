<?php

namespace App\Exports;

use App\Models\Course;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CoursesExports implements FromView
{

    protected $request;

    public function __construct($request) 
    {

        $this->request = $request;

    }

    public function view(): View
    {
        return view(
            config(
                'app.excel_view', 
                'app::excel.'
            ) . 'course', 
            [
                'courses' => $this->getQuery()
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(Course::class, $this->request);

    }

}