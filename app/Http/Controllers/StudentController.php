<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function edit(Request $request) {
        $array = [
            "id" => 87654321,
            "grade" => 2,
            "name" => "北條", 
            "address" => "大阪府堺市南区26",
            "comment" => "昨年より成績が下がりました",
        ];
        return view('student.edit', compact('array'));
    }
    
}
