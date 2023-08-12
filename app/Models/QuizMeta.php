<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'quiz_id'
    ];

    public function quiz() 
    {
        $this->belongsTo(Quiz::class);
    }

}
