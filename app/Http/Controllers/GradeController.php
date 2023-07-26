<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function edit(Request $request) {
        $array = [
            "grade" => 2,
            "term" => 1,
            "japanese" => 2, 
            "math" => 2,
            "science" => 5,
            "socialstudies" => 4,
            "music" => 3,
            "homeeconomics" => 4,
            "english" => 2,
            "art" => 5,
            "health_and_physical_education" => 5,
        ];
        return view('student.edit-grades', compact('array'));
    }
}
