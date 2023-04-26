<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\CourseController;
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
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

<<<<<<< Updated upstream
Auth::routes();

// Eto
Route::post('/courses', [CourseController::class, 'store'])->name('course.store');
Route::get('/courses', [CourseController::class, 'index'])->name('course.index');

Route::get('/admin/course', [App\Http\Controllers\HomeController::class, 'index'])->name('course');

Route::get('/members/appointment', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment');

Route::get('/members/invoice', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice');

Route::get('/members/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');


Route::get('/admin/members', [App\Http\Controllers\Admin\MemberController::class, 'index'])->name('members');
Route::get('/admin/appointments', [App\Http\Controllers\Admin\AppointmentController::class, 'index'])->name('appointments');
Route::get('/admin/schedules', [App\Http\Controllers\Admin\ScheduleController::class, 'index'])->name('schedules');
Route::get('/admin/invoice', [App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('invoice');
=======
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
    Route::put('/edit_appt/{id}', ['as' => 'edit_appt', 'uses' => "Admin\AppointmentController@edit"]);
    Route::put('/decline_appt/{id}', ['as' => 'decline_appt', 'uses' => "Admin\AppointmentController@destroy"]);
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
    Route::get('/', ['as' => 'book_course', 'uses' => "Members\BookcourseController@index"]);
    Route::get('/create_book_course/{id}', ['as' => 'create_book_course', 'uses' => "Members\BookcourseController@create"]);
    Route::post('/store_book_course', ['as' => 'store_book_course', 'uses' => "Members\BookcourseController@store"]);
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
>>>>>>> Stashed changes
