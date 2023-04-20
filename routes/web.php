<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Members\BookcourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Members\AppointmentController;
use App\Http\Controllers\Members\InvoiceController;
use App\Http\Controllers\Members\ProfileController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Members\LoginController;
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
    return view('auth/login');
});

Route::get('/user', function () {
    return view('members/Auth/login');
});
Route::get('/welcome', function () {
    return view('welcome');
});


Auth::routes();

Route::post('/courses', [CourseController::class, 'store'])->name('course.store');
Route::patch('/courses/{course_id}', [CourseController::class, 'update'])->name('course.update');
Route::delete('/courses/{course_id}', [CourseController::class, 'destroy'])->name('course.destroy');
Route::get('/courses', [CourseController::class, 'index'])->name('course.index');


// Members Book Course Routes
Route::get('/members/bookcourse', [BookcourseController::class, 'index'])->name('bookcourse');
Route::get('/bookcourses', [BookcourseController::class, 'index'])->name('bookcourse.index');


Route::resource('/members', MemberController::class);
Route::get('/admin/members', [MemberController::class, 'index'])->name('members');

Route::resource('/memberlogin', LoginController::class);

// Route::namespace('members\Auth')->group(function () {
//     Route::get('login', 'LoginController@showLoginForm')->name('login');
//     Route::post('login', 'LoginController@login')->name('login.store');
// });

// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/', ['as' => 'index', 'uses' => "MemberController@index"]);
//     Route::post('members', ['as' => 'store', 'uses' => "MemberController@store"]);
//     Route::put('members/{course_id}', ['as' => 'update', 'uses' => "MemberController@update"]);
//     Route::delete('members/{course_id}', ['as' => 'destroy', 'uses' => "MemberController@destroy"]);
// });

// Route::group(['prefix' => 'admin'], function () {
//     Route::resource('users', 'Admin\UserController');
// });


// Sample Only
Route::get('/admin/course', [HomeController::class, 'index'])->name('course');


Route::get('/members/appointment', [AppointmentController::class, 'index'])->name('appointment');
Route::get('/members/invoice', [InvoiceController::class, 'index'])->name('invoice');
Route::get('/members/profile', [ProfileController::class, 'index'])->name('profile');



Route::get('/admin/appointments', [AppointmentController::class, 'index'])->name('appointments');
Route::get('/admin/schedules', [ScheduleController::class, 'index'])->name('schedules');
Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('transactions');
