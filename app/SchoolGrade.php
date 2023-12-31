<?php

namespace App;

use App\Student;
use Illuminate\Database\Eloquent\Model;

class SchoolGrade extends Model
{
    public function student() {
        return $this->belongsTo(Student::class);  //関係性
    }
}
