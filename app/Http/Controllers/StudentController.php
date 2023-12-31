<?php

namespace App\Http\Controllers;

use App\Student;
use App\SchoolGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    //学生表示
    public function index(Request $request) {

        $name = $request->name; 
        $grade = $request->grade;
        if (isset($name) || isset($grade)) {
            if ($grade == '-1'){
                $students = Student::where('name', 'like', '%'.$name.'%')->get();   //学生名検索、whereは絞り込み
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
    public function show(Request $request, $id) {

        $student = Student::find($id);
        $grade = $request->grade;
        $term = $request->term;
        $school_grade = null;
        if (isset($grade) || isset($term)) {
            $school_grade = Schoolgrade::where('student_id', $id)
                ->where('grade', $grade)
                ->where('term', $term)
                ->first();
        }
        
        return view('student.detail', compact('student', 'school_grade', 'grade', 'term'));
    }

    //学生編集を表示
    public function edit($id) {
        
        $student = Student::find($id);
        $student->img_path = 'storage/photo/'.$student->id.'.png';

        return view('student.edit', compact('student'));
    }
    
    //学生登録
    public function store(Request $request) {
        $student = new Student();
        $student->name = $request->name; 
        $student->address = $request->address; 
        $student->img_path = '';
        $student->save();

        $request->file('photo')->storeAs('public/photo', $student->id.'.png');
        $student->img_path = 'storage/photo/'.$student->id.'.png';
        $student->update();

        return redirect('/student/register')->with('flash_message','登録が完了しました');
    }
    
    public function update(Request $request, $id) {
        $photo = $request->file('photo');

        if( !is_null( $photo ) ) {
            $photo->storeAs('public/photo', $id.'.png');
        }

        $student = Student::find($id);
        $student->grade = $request->grade;
        $student->name = $request->name;
        $student->address = $request->address;
        // $student->img_path = 'storage/photo/'.$student->id.'.png';
        $student->comment = $request->comment;
        $student->update();

        return redirect('student/'.$id.'/edit')->with('flash_message','編集が完了しました');
    }

    // 学生削除
    public function destroy($id) {
        Student::destroy($id);

        return redirect('/student');
    }

    //学年更新
    public function gradeUpdate() {
        Student::where('grade', '<>', 3)->chunk(100, function ($students) {  //<>否定(__じゃない)
            foreach ($students as $student){  //$studentに1つの学生の情報が入っている
                $student->grade++;  //学年を1更新する
                $student->save();
            }
        });

        return redirect('/')->with('flash_message','更新が完了しました');
    }
}