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

Route::get('/student', function() {
  return view('student.index');
});

Route::get('/student/detail', function() {
  return view('student.detail');
});

Route::get('/student/edit', 'StudentController@edit')->name('student.edit');
// Route::get read(参照)
// Route::post create(登録)

Route::get('/student/grades', function() {
  return view('student.grades');
});

Route::get('/student/edit-grades', 'GradeController@edit')->name('student.edit-grades');
