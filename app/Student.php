<?php

namespace App;

use App\SchoolGrade;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'grade', 'name', 'address', 'img_path', 'comment'
    ];

    public function schoolGrades() {
        return $this->hasMany(SchoolGrade::class);  //関係性
    }
}
