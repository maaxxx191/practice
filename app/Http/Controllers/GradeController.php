<?php

namespace App\Http\Controllers;

use App\SchoolGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function showAddForm($id){
        return view('student.add-grade', compact('id'));  //成績登録画面にIDを渡す
    }

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

    public function store(Request $request, $id) {
        $grade = new SchoolGrade();
        $grade->student_id = $id;
        $grade->grade = $request->grade;
        $grade->term = $request->term;
        $grade->japanese = $request->japanese;
        $grade->math = $request->math;
        $grade->science = $request->science;
        $grade->social_studies = $request->socialstudies;
        $grade->music = $request->music;
        $grade->home_economics = $request->homeeconomics;
        $grade->english = $request->english;
        $grade->art = $request->art;
        $grade->health_and_physical_education = $request->health_and_physical_education;
        $grade->save();

        return redirect('grade/'.$id.'/add')->with('flash_message','登録が完了しました');


        // $student = new Student();
        // $student->name = $request->name; 
        // $student->address = $request->address; 
        // $student->img_path = '';
        // // // // $student->img_path = $request->photo;
        // $student->save();

        // return redirect('/student/register')->with('flash_message','登録が完了しました');
    }
    
}
