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
//TODO: change it to index
Route::get('/', function () {
    return view('welcome');
});
Route::get('/laravel', function () {
    return view('welcome2');
});
//added for testing
Route::get('/index', function () {

    return view('index');
 
 });
//
Route::resource('students','StudentController')->middleware('auth');
Route::resource('persons','PersonController');
Route::resource('teachers','TeacherController');
Route::resource('courses','CourseController');
Route::resource('prerequisties','PrerequistiesController');
Route::resource('contents','ContentController');
Route::resource('takes','CourseStudentController')->except([
    'index','update','edit','create'
]);


Route::get('/courses/addToCart/{id}',[
   'uses' => 'CourseController@add_to_cart',
    'as'  => 'courses.addToCart'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
