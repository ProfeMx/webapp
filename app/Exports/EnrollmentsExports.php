<?php

namespace App\Exports;

use App\Models\Enrollment;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EnrollmentsExports implements FromView
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
            ) . 'enrollment', 
            [
                'enrollments' => $this->getQuery(),
                'exportCols' => Enrollment::$exportCols,
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(Enrollment::class, $this->data);

    }

}