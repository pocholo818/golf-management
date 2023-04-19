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

Auth::routes();

Route::post('/courses', [CourseController::class, 'store'])->name('course.store');
Route::patch('/courses/{course_id}', [CourseController::class, 'update'])->name('course.update');
Route::delete('/courses/{course_id}', [CourseController::class, 'destroy'])->name('course.destroy');
Route::get('/courses', [CourseController::class, 'index'])->name('course.index');


// Members Book Course Routes
Route::get('/members/bookcourse', [App\Http\Controllers\Members\BookcourseController::class, 'index'])->name('bookcourse');
Route::get('/bookcourses', [BookcourseController::class, 'index'])->name('bookcourse.index');

// Sample Only
Route::get('/admin/course', [App\Http\Controllers\HomeController::class, 'index'])->name('course');


Route::get('/members/appointment', [App\Http\Controllers\Members\AppointmentController::class, 'index'])->name('appointment');
Route::get('/members/invoice', [App\Http\Controllers\Members\InvoiceController::class, 'index'])->name('invoice');
Route::get('/members/profile', [App\Http\Controllers\Members\ProfileController::class, 'index'])->name('profile');


Route::get('/admin/members', [App\Http\Controllers\Admin\MemberController::class, 'index'])->name('members');
Route::get('/admin/appointments', [App\Http\Controllers\Admin\AppointmentController::class, 'index'])->name('appointments');
Route::get('/admin/schedules', [App\Http\Controllers\Admin\ScheduleController::class, 'index'])->name('schedules');
Route::get('/admin/transactions', [App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions');
