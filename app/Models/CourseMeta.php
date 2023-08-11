<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'course_id'
    ];

    public function course() 
    {
        $this->belongsTo(Course::class);
    }

}
