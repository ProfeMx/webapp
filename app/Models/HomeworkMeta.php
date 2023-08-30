<?php

namespace App\Models;

use App\Models\Homework;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkMeta extends Model
{

    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'homework_id'
    ];

    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }

}
