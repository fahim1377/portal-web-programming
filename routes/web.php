<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/laravel', function () {
    return view('welcome2');
});

Route::resource('students','StudentController');
Route::resource('persons','PersonController');
Route::resource('teachers','TeacherController');
Route::resource('courses','CourseController');
Route::resource('prerequisties','PrerequistiesController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
