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
Route::get('/admin', ['as' => 'admin_login', 'uses' => 'Auth\AdminController@index']);

Route::post('/home', ['as' => 'home', 'uses' => 'Auth\AdminController@store']);

Route::post('/admin/logout', ['as' => 'adminLogout', 'uses' => 'Auth\AdminController@destroy']);

Route::group(['prefix' => 'admin/member'], function () {
    Route::get('/', ['as' => 'memberManage', 'uses' => "Admin\MemberController@index"]);
    Route::get('/create', ['as' => 'memberCreate', 'uses' => "Admin\MemberController@create"]);
    Route::post('/store', ['as' => 'memberStore', 'uses' => "Admin\MemberController@store"]);
    Route::get('/edit/{id}', ['as' => 'memberEdit', 'uses' => "Admin\MemberController@edit"]);
    Route::put('/update/{id}', ['as' => 'memberUpdate', 'uses' => "Admin\MemberController@update"]);
    Route::delete('/delete/{id}', ['as' => 'memberDelete', 'uses' => "Admin\MemberController@destroy"]);
});

Route::group(['prefix' => 'admin/appointment'], function () {
    Route::get('/', ['as' => 'appointments', 'uses' => "Admin\AppointmentController@index"]);
    Route::put('/edit/{id}', ['as' => 'appoinmentAdminEdit', 'uses' => "Admin\AppointmentController@edit"]);
    Route::put('/decline/{id}', ['as' => 'appoinmentAdminDecline', 'uses' => "Admin\AppointmentController@destroy"]);
});

//Crud golf course
Route::group(['prefix' => 'admin/course'], function () {
    Route::get('/', ['as' => 'course', 'uses' => "Admin\CourseController@index"]);
    Route::get('/create', ['as' => 'courseCreate', 'uses' => "Admin\CourseController@create"]);
    // Route::namespace('courseCreate')->get('/create', "Admin\CourseController@create");
    Route::post('/store', ['as' => 'courseStore', 'uses' => "Admin\CourseController@store"]);
    Route::get('/edit/{id}', ['as' => 'courseEdit', 'uses' => "Admin\CourseController@edit"]);
    Route::put('/update/{id}', ['as' => 'courseUpdate', 'uses' => "Admin\CourseController@update"]);
    Route::delete('/delete/{id}', ['as' => 'courseDelete', 'uses' => "Admin\CourseController@destroy"]);
});

Route::group(['prefix' => 'admin/schedules'], function () {
    Route::get('/', ['as' => 'schedules', 'uses' => "Admin\ScheduleController@index"]);
});

Route::group(['prefix' => 'admin/transaction'], function () {
    Route::get('/', ['as' => 'transaction', 'uses' => "Admin\TransactionController@index"]);
});



//Members Routes
Route::get('/member', ['as' => 'member_login', 'uses' => 'Auth\MemberController@index']);
Route::post('/index', ['as' => 'index', 'uses' => 'Auth\MemberController@store']);
Route::post('/member/logout', ['as' => 'memberLogout', 'uses' => 'Auth\MemberController@destroy']);

Route::group(['prefix' => 'member/book/course'], function () {
    Route::get('/', ['as' => 'bookCourse', 'uses' => "Members\BookCourseController@index"]);
    Route::get('/create/{id}', ['as' => 'bookCreate', 'uses' => "Members\BookCourseController@create"]);
    Route::post('/store', ['as' => 'bookStore', 'uses' => "Members\BookCourseController@store"]);
});

Route::group(['prefix' => 'member/appointment'], function () {
    Route::get('/', ['as' => 'appointment', 'uses' => "Members\AppointmentController@index"]);
    Route::get('/edit/{id}', ['as' => 'appointmentEdit', 'uses' => "Members\AppointmentController@edit"]);
    Route::put('/update/{id}', ['as' => 'appointmentUpdate', 'uses' => "Members\AppointmentController@update"]);
    Route::delete('/delete/{id}', ['as' => 'appointmentDelete', 'uses' => "Members\AppointmentController@destroy"]);
});

Route::group(['prefix' => 'member/invoice'], function () {
    Route::get('/', ['as' => 'invoice', 'uses' => "Members\InvoiceController@index"]);
});

Route::group(['prefix' => 'member/profile'], function () {
    Route::get('/', ['as' => 'profile', 'uses' => "Members\ProfileController@index"]);
    Route::get('/edit/{id}', ['as' => 'profileEdit', 'uses' => "Members\ProfileController@edit"]);
    Route::put('/update/{id}', ['as' => 'profileUpdate',  'uses' => "Members\ProfileController@update"]);
});
