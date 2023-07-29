<?php

namespace App\Http\Controllers;

use App\Student;
use App\SchoolGrade;
use Illuminate\Http\Request;

class StudentController extends Controller
{
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

    public function show($id) {

        $student = Student::find($id);
        $grades = SchoolGrade::where('student_id', $id) 
            ->orderBy('grade')
            ->orderBy('term')
            ->get(); 
        
        return view('student.detail', compact('student', 'grades'));
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