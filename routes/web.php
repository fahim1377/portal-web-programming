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
    return view('index');
});
Route::get('/laravel', function () {
    return view('welcome2');
});
//added for testing
Route::get('/index', function () {

    return view('index');

});
//
Route::post('/students/{id}/edit','StudentController@edit')->middleware('auth');
Route::resource('students','StudentController')->except(['edit','create','store'])->middleware('auth');
Route::resource('persons','PersonController')->except(['create','store'])->middleware('auth');
Route::resource('teachers','TeacherController')->except(['create','store'])->middleware('auth');
Route::resource('courses','CourseController')->only(['index'])->middleware('auth');
//TODO Route::resource('prerequisties','PrerequistiesController');
//TODO Route::resource('contents','ContentController');
/**********this route is seperate because you dont need to send id to show and store in url******************/
Route::get('/takes','CourseStudentController@show')->middleware('auth');
Route::post('/takes','CourseStudentController@store')->middleware('auth');
Route::delete('/takes/{id}','CourseStudentController@destroy')->middleware('auth');
/*****************************************end part****************************************************************/


Route::get('/courses/addToCart/{id}',[
    'uses' => 'CourseController@add_to_cart',
    'as'  => 'courses.addToCart'
])->middleware('auth');

Auth::routes();

Route::get('/logout','Auth\LoginController@logout')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
