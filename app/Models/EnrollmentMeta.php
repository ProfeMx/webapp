<?php

namespace App\Models;

use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'enrollment_id'
    ];

    public function enrollment() 
    {
        $this->belongsTo(Enrollment::class);
    }

}
