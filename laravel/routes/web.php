<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'class'], function () {
        Route::get('list', 'ClasseController@index')->name('class.list');
        Route::post('create', 'ScoreController@create')->name('class.create');
        Route::get('delete', 'ClasseController@destroy')->name('class.delete');
        Route::post('edit', 'ClasseController@edit')->name('class.edit');
    });

    Route::group(['prefix' => 'teacher'], function () {
        Route::get('list', 'TeacherController@index')->name('teacher.list');
        Route::get('listgv', 'TeacherController@apiGetGV')->name('teacher.getGV');
        Route::post('create', 'TeacherController@create')->name('teacher.create');
        Route::get('delete/{id}', 'TeacherController@destroy')->name('teacher.delete');
        Route::post('update/{id}', 'TeacherController@update')->name('teacher.update');
        Route::get('show/{id}', 'TeacherController@show')->name('teacher.show');

    });

    Route::group(['prefix' => 'student'], function () {
        Route::get('list', 'StudentController@index')->name('student.list');
        Route::post('create', 'StudentController@create')->name('student.create');
        Route::get('delete/{id}', 'StudentController@destroy')->name('student.delete');
        Route::post('edit', 'StudentController@edit')->name('student.edit');
    });
});

