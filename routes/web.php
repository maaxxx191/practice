<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() { 
  return view('welcome');
}); 


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/student/register', function() {
  return view('student.register');
});

Route::post('/student/register', 'StudentController@store')->name('student.register'); 
// Route::〇〇('URL', 'コントローラー名@メソッド名')

Route::get('/student', 'StudentController@index')->name('student.index');

Route::get('/student/{id}', 'StudentController@show')->name('student.show');  //学生詳細

Route::get('/student/{id}/edit', 'StudentController@edit')->name('student.edit'); 
// Route::get read(参照)
// Route::post create(登録)

Route::get('/grade/{id}/add', 'GradeController@showAddForm')->name('showAddForm');

Route::post('/grade/{id}/add', 'GradeController@store')->name('student.add-grade');

Route::get('/grade/{id}/edit', 'GradeController@edit')->name('student.edit-grades');

Route::post('/grade/{id}/edit', 'GradeController@update')->name('student.grade-update');
