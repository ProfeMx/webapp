<?php

namespace App\Models;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'lesson_id'
    ];

    public function lesson() 
    {
        $this->belongsTo(Lesson::class);
    }

}
