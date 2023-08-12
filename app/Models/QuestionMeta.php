<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'question_id'
    ];

    public function question() 
    {
        $this->belongsTo(Question::class);
    }

}
