<?php

namespace App\Exports;

use App\Models\EnrollmentLog;
use Innoboxrr\SearchSurge\Search\Builder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EnrollmentLogsExports implements FromView
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
            ) . 'enrollment_log', 
            [
                'enrollment_logs' => $this->getQuery(),
                'exportCols' => EnrollmentLog::$exportCols,
            ]
        );
    }

    public function getQuery()
    {   

        $builder = new Builder();

        return $builder->get(EnrollmentLog::class, $this->data);

    }

}