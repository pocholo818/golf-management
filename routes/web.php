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
Route::get('/Admin', ['as' => 'admin_login', 'uses' => 'Auth\AdminController@index']);

Route::post('/home', ['as' => 'home', 'uses' => 'Auth\AdminController@store']);

Route::post('/admin_logout', ['as' => 'admin_logout', 'uses' => 'Auth\AdminController@destroy']);

Route::group(['prefix' => 'admin/member'], function () {
    Route::get('/', ['as' => 'manage_member', 'uses' => "Admin\MemberController@index"]);
    Route::get('/create_member', ['as' => 'create_member', 'uses' => "Admin\MemberController@create"]);
    Route::post('/store_member', ['as' => 'store_member', 'uses' => "Admin\MemberController@store"]);
    Route::get('edit_member/{id}', ['as' => 'edit_member', 'uses' => "Admin\MemberController@edit"]);
    Route::put('update_member/{id}', ['as' => 'update_member', 'uses' => "Admin\MemberController@update"]);
    Route::delete('delete_member/{id}', ['as' => 'delete_member', 'uses' => "Admin\MemberController@destroy"]);
});

Route::group(['prefix' => 'admin/appointment'], function () {
    Route::get('/', ['as' => 'appointments', 'uses' => "Admin\AppointmentController@index"]);
});
//Crud golf course
Route::group(['prefix' => 'admin/golf_course'], function () {
    Route::get('/', ['as' => 'golf_course', 'uses' => "Admin\CourseController@index"]);
    Route::get('/create_course', ['as' => 'create_course', 'uses' => "Admin\CourseController@create"]);
    Route::post('/store_course', ['as' => 'store_course', 'uses' => "Admin\CourseController@store"]);
    Route::get('/edit_course/{id}', ['as' => 'edit_course', 'uses' => "Admin\CourseController@edit"]);    
    Route::put('/update_course/{id}', ['as' => 'update_course', 'uses' => "Admin\CourseController@update"]);    
    Route::delete('/delete_course/{id}', ['as' => 'delete_course', 'uses' => "Admin\CourseController@destroy"]);
});

Route::group(['prefix' => 'admin/schedules'], function () {
    Route::get('/', ['as' => 'schedules', 'uses' => "Admin\ScheduleController@index"]);
});

Route::group(['prefix' => 'admin/transaction'], function () {
    Route::get('/', ['as' => 'transaction', 'uses' => "Admin\TransactionController@index"]);
});



//Members Routes
Route::get('/Member', ['as' => 'member_login', 'uses' => 'Auth\MemberController@index']);
Route::post('/index', ['as' => 'index', 'uses' => 'Auth\MemberController@store']);
Route::post('/member_logout', ['as' => 'member_logout', 'uses' => 'Auth\MemberController@destroy']);

Route::group(['prefix' => 'member/book_course'], function () {
    Route::get('/', ['as' => 'book_course', 'uses' => "Members\BookCourseController@index"]);
    Route::get('/create_book_course/{id}', ['as' => 'create_book_course', 'uses' => "Members\BookCourseController@create"]);
    Route::post('/store_book_course', ['as' => 'store_book_course', 'uses' => "Members\BookCourseController@store"]);
});

Route::group(['prefix' => 'member/appointment'], function () {
    Route::get('/', ['as' => 'appointment', 'uses' => "Members\AppointmentController@index"]);
    Route::get('/edit_appointment/{id}', ['as' => 'edit_appointment', 'uses' => "Members\AppointmentController@edit"]);
    Route::put('/update_appointment/{id}', ['as' => 'update_appointment', 'uses' => "Members\AppointmentController@update"]);
    Route::delete('/delete_appointment/{id}', ['as' => 'delete_appointment', 'uses' => "Members\AppointmentController@destroy"]);
});

Route::group(['prefix' => 'member/invoice'], function () {
    Route::get('/', ['as' => 'invoice', 'uses' => "Members\InvoiceController@index"]);
});

Route::group(['prefix' => 'member/profile'], function () {
    Route::get('/', ['as' => 'profile', 'uses' => "Members\ProfileController@index"]);
});