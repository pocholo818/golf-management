<?php

use Illuminate\Support\Facades\Route;
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
// Route::get('/admin/invoice', [App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('invoice');
