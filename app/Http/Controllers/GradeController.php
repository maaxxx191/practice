<?php

namespace App\Http\Controllers;

use App\SchoolGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function showAddForm($id){
        return view('student.add-grade', compact('id'));  //成績登録画面にIDを渡す
    }

    public function edit($id) {
        $grade = SchoolGrade::find($id);
        return view('student.edit-grades', compact('grade'));
    }

    public function update(Request $request, $id) {
        $grade = SchoolGrade::find($id);
        $grade->japanese = $request->japanese;
        $grade->math = $request->math;
        $grade->science = $request->science;
        $grade->social_studies = $request->socialstudies;
        $grade->music = $request->music;
        $grade->home_economics = $request->homeeconomics;
        $grade->english = $request->english;
        $grade->art = $request->art;
        $grade->health_and_physical_education = $request->health_and_physical_education;
        $grade->update();

        //ルートpostの時はredirect（ルートgetの時はview）
        return redirect('grade/'.$id.'/edit')->with('flash_message','編集が完了しました');
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
    }

    //成績削除
    public function destroy(Request $request, $id) {
        SchoolGrade::destroy($id);

        return redirect('student/'.$request->student_id);
    }
    
}
