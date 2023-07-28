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

Route::get('/student/detail', 'StudentController@show')->name('student.show');

Route::get('/student/edit', 'StudentController@edit')->name('student.edit');
// Route::get read(参照)
// Route::post create(登録)

Route::get('/grade/add', function() {
  return view('student.add-grade');
});

Route::get('/grade/edit', 'GradeController@edit')->name('student.edit-grades');
