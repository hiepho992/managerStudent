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
Route::get('register', 'HomeController@register')->name('register');
Route::post('create', 'Auth\RegisterController@create')->name('register.create');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'subject'], function () {
        Route::get('list', 'SubjectController@index')->name('subject.list');
        Route::get('show', 'SubjectController@show')->name('subject.getkh');
        Route::post('create', 'SubjectController@create')->name('subject.create');
        Route::delete('delete/{id}', 'SubjectController@destroy')->name('subject.delete');
        Route::get('edit/{id}', 'SubjectController@edit')->name('subject.edit');
        Route::post('update/{id}', 'SubjectController@update')->name('subject.update');
    });

    Route::group(['prefix' => 'class'], function () {
        Route::get('list', 'ClasseController@index')->name('class.list');
        Route::get('show', 'ClasseController@show')->name('class.show');
        Route::post('create', 'ClasseController@create')->name('class.create');
        Route::delete('delete/{id}', 'ClasseController@destroy')->name('class.delete');
        Route::get('edit/{id}', 'ClasseController@edit')->name('class.edit');
        Route::post('update/{id}', 'ClasseController@update')->name('class.update');
        Route::get('getStudent/{id}', 'ClasseController@getStudent')->name('class.getStudent');
    });

    Route::group(['prefix' => 'teacher'], function () {
        Route::get('list', 'TeacherController@index')->name('teacher.list');
        Route::get('listgv', 'TeacherController@apiGetGV')->name('teacher.getGV');
        Route::post('create', 'TeacherController@create')->name('teacher.create');
        Route::get('delete/{id}', 'TeacherController@destroy')->name('teacher.delete');
        Route::post('update/{id}', 'TeacherController@update')->name('teacher.update');
        Route::get('show/{id}', 'TeacherController@show')->name('teacher.show');
        Route::get('getStudent/{id}', 'TeacherController@getStudent')->name('teacher.getStudent');
    });

    Route::group(['prefix' => 'student'], function () {
        Route::get('list', 'StudentController@index')->name('student.list');
        Route::get('show', 'StudentController@show')->name('student.show');
        Route::post('create', 'StudentController@create')->name('student.create');
        Route::get('get/{id}', 'StudentController@get')->name('student.get');
        Route::delete('delete/{id}', 'StudentController@destroy')->name('student.delete');
        Route::post('update/{id}', 'StudentController@update')->name('student.update');
    });


});

