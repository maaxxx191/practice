<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request) {
        $students = [
            [
                "grade" => 2,
                "name" => "北條", 
            ],
            [
                "grade" => 1,
                "name" => "大山",
            ],
            [
                "grade" => 3,
                "name" => "岡田",
            ]
        ];
        return view('student.index', compact('students'));
    }

    public function show(Request $request) {
        $student = [
            "grade" => 2,
            "name" => "岡田", 
            "address" => "兵庫県西宮市甲子園80",
        ];
        $grade = [
            "grade" => 1,
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
        return view('student.detail', compact('student', 'grade'));

    }

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