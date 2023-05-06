<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Admin Routes

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function(){

    Route::group(['prefix' => 'login', ], function () {
        Route::get('/', ['as' => 'login', 'uses' => 'AdminController@login']);
        Route::post('/authenticated', ['as' => 'authenticated', 'uses' => 'AdminController@authenticated']);
        Route::post('/logout', ['as' => 'logout', 'uses' => 'AdminController@logout']);
    });

Route::group(['prefix' => 'member'], function () {
    Route::get('/', ['as' => 'memberManage', 'uses' => "MemberController@index"]);
    Route::get('/create', ['as' => 'create', 'uses' => "MemberController@create"]);
    Route::post('/create', ['as' => 'store', 'uses' => "MemberController@store"]);
    Route::get('/edit/{id}', ['as' => 'edit', 'uses' => "MemberController@edit"]);
    Route::put('/update/{id}', ['as' => 'update', 'uses' => "MemberController@update"]);
    Route::delete('/delete/{id}', ['as' => 'delete', 'uses' => "MemberController@destroy"]);
});

Route::group(['prefix' => 'appointment'], function () {
    Route::get('/', ['as' => 'appointments', 'uses' => "AppointmentController@index"]);
    Route::put('/edit/{id}', ['as' => 'accept', 'uses' => "AppointmentController@accept"]);
    Route::put('/decline/{id}', ['as' => 'decline', 'uses' => "AppointmentController@decline"]);
});

//Crud golf course
Route::group(['prefix' => 'course'], function () {
    Route::get('/', ['as' => 'course', 'uses' => "CourseController@index"]);
    Route::get('/create', ['as' => 'create', 'uses' => "CourseController@create"]);
    // Route::namespace('courseCreate')->get('/create', "Admin\CourseController@create");
    Route::post('/create', ['as' => 'store', 'uses' => "CourseController@store"]);
    Route::get('/edit/{id}', ['as' => 'edit', 'uses' => "CourseController@edit"]);
    Route::put('/update/{id}', ['as' => 'update', 'uses' => "CourseController@update"]);
    Route::delete('/delete/{id}', ['as' => 'delete', 'uses' => "CourseController@destroy"]);
});

Route::group(['prefix' => 'schedules'], function () {
    Route::get('/', ['as' => 'schedules', 'uses' => "ScheduleController@index"]);
});

Route::group(['prefix' => 'transaction'], function () {
    Route::get('/', ['as' => 'transaction', 'uses' => "TransactionController@index"]);
});

Route::group(['prefix' => 'usertype'], function () {
    Route::get('/', ['as' => 'usertype', 'uses' => "UserTypeController@index"]);
    Route::get('/create', ['as' => 'create', 'uses' => "UserTypeController@create"]);
    Route::post('/create', ['as' => 'store', 'uses' => "UserTypeController@store"]);
    Route::get('/edit/{id}', ['as' => 'edit', 'uses' => "UserTypeController@edit"]);
    Route::put('/update/{id}', ['as' => 'update', 'uses' => "UserTypeController@update"]);
    Route::delete('/delete/{id}', ['as' => 'delete', 'uses' => "UserTypeController@destroy"]);
});

});


//Members Routes
Route::group(['prefix'=>'member', 'namespace'=>'Members'], function(){

    Route::group(['prefix' => 'login'], function () {
    Route::get('/', ['as' => 'login', 'uses' => 'MemberController@login']);
    Route::post('/authenticate', ['as' => 'authenticate', 'uses' => 'MemberController@authenticate']);
    Route::post('/logout', ['as' => 'member.logout', 'uses' => 'MemberController@logout']);
});

    Route::group(['prefix' => 'book-course'], function () {
        Route::get('/', ['as' => 'bookCourse', 'uses' => "BookCourseController@index"]);
        Route::get('/create/{id}', ['as' => 'bookCreate', 'uses' => "BookCourseController@create"]);
        Route::post('/store', ['as' => 'bookStore', 'uses' => "BookCourseController@store"]);
    });
    
    Route::group(['prefix' => 'appointment'], function () {
        Route::get('/', ['as' => 'appointment', 'uses' => "AppointmentController@index"]);
        Route::get('/edit/{id}', ['as' => 'appointmentEdit', 'uses' => "AppointmentController@edit"]);
        Route::put('/update/{id}', ['as' => 'appointmentUpdate', 'uses' => "AppointmentController@update"]);
        Route::delete('/delete/{id}', ['as' => 'appointmentDelete', 'uses' => "AppointmentController@destroy"]);
    });
    
    Route::group(['prefix' => 'invoice'], function () {
        Route::get('/', ['as' => 'invoice', 'uses' => "InvoiceController@index"]);
    });
    
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', ['as' => 'profile', 'uses' => "ProfileController@index"]);
        Route::get('/edit/{id}', ['as' => 'profileEdit', 'uses' => "ProfileController@edit"]);
        Route::put('/update/{id}', ['as' => 'profileUpdate',  'uses' => "ProfileController@update"]);
    });
    
});
