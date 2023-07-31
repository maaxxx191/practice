<?php

namespace App\Http\Controllers;

use App\Student;
use App\SchoolGrade;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //学生表示
    public function index(Request $request) {

        $name = $request->name; 
        $grade = $request->grade;
        if (isset($name) || isset($grade)) {
            if ($grade == '-1'){
                $students = Student::where('name', 'like', '%'.$name.'%')->get();   //学生名検索
            } else {
                $students = Student::where('name', 'like', '%'.$name.'%')
                    ->where('grade', $grade)
                    ->get();    //学生名、学年検索
            }
        } else {
            $students = Student::get();  // 全てのデータが取得できる
        }
           
         
        return view('student.index', compact('students', 'name', 'grade'));
    }

    //学生詳細
    public function show($id) {

        $student = Student::find($id);
        $grades = SchoolGrade::where('student_id', $id) 
            ->orderBy('grade')
            ->orderBy('term')
            ->get(); 
        
        return view('student.detail', compact('student', 'grades'));
    }

    //学生編集を表示
    public function edit($id) {
        
        $student = Student::find($id);
        
        return view('student.edit', compact('student'));
    }
    
    //学生編集処理
    public function store(Request $request) {
        $student = new Student();
        $student->name = $request->name; 
        $student->address = $request->address; 
        $student->img_path = '';
        // // // $student->img_path = $request->photo;
        $student->save();

        return redirect('/student/register')->with('flash_message','登録が完了しました');
    }
    
}