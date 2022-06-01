<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    
    public function exams(){
        return $this->belongsToMany(Exam::class);
    }
    public function choices()
    {
        return $this->hasMany(Choice::class,'question_id');
    }
}
