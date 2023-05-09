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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin',], function () {

    Route::group(['prefix' => 'login', 'middleware' => 'admin.guest'], function () {
        Route::get('/', ['as' => 'login-admin', 'uses' => 'AdminController@login']);
        Route::post('/authenticated', ['as' => 'authenticated', 'uses' => 'AdminController@authenticated']);
    });

    //Authenticated Routes
    Route::group(['middleware' => ['admin.auth']], function () {
        Route::post('/logout', ['as' => 'logout-admin', 'uses' => 'AdminController@logout',]);

        Route::group(['prefix' => 'member',], function () {
            Route::get('/', ['as' => 'member', 'uses' => "MemberController@index"]);
            Route::get('/create', ['as' => 'create-member', 'uses' => "MemberController@create"]);
            Route::post('/create', ['as' => 'store-member', 'uses' => "MemberController@store"]);
            Route::get('/edit/{id}', ['as' => 'edit-member', 'uses' => "MemberController@edit"]);
            Route::put('/update/{id}', ['as' => 'update-member', 'uses' => "MemberController@update"]);
            Route::delete('/delete/{id}', ['as' => 'delete-member', 'uses' => "MemberController@destroy"]);
        });

        Route::group(['prefix' => 'appointment'], function () {
            Route::get('/', ['as' => 'appointments', 'uses' => "AppointmentController@index"]);
            Route::put('/edit/{id}', ['as' => 'accept', 'uses' => "AppointmentController@accept"]);
            Route::put('/decline/{id}', ['as' => 'decline', 'uses' => "AppointmentController@decline"]);
        });

        //Crud golf course
        Route::group(['prefix' => 'course'], function () {
            Route::get('/', ['as' => 'course', 'uses' => "CourseController@index"]);
            Route::get('/create', ['as' => 'create-course', 'uses' => "CourseController@create"]);
            // Route::namespace('courseCreate')->get('/create', "Admin\CourseController@create");
            Route::post('/create', ['as' => 'store-course', 'uses' => "CourseController@store"]);
            Route::get('/edit/{id}', ['as' => 'edit-course', 'uses' => "CourseController@edit"]);
            Route::put('/update/{id}', ['as' => 'update-course', 'uses' => "CourseController@update"]);
            Route::delete('/delete/{id}', ['as' => 'delete-course', 'uses' => "CourseController@destroy"]);
        });

        Route::group(['prefix' => 'schedules'], function () {
            Route::get('/', ['as' => 'schedules', 'uses' => "ScheduleController@index"]);
        });

        Route::group(['prefix' => 'transaction'], function () {
            Route::get('/', ['as' => 'transaction', 'uses' => "TransactionController@index"]);
        });

        Route::group(['prefix' => 'kiosk'], function () {
            Route::get('/', ['as' => 'kiosk', 'uses' => "KioskController@index"]);
        });

        Route::group(['prefix' => 'services'], function () {
            Route::get('/', ['as' => 'services', 'uses' => "ServicesController@index"]);
        });

        Route::group(['prefix' => 'merchandise'], function () {
            Route::get('/', ['as' => 'merchandise', 'uses' => "MerchandiseController@index"]);
        });

        Route::group(['prefix' => 'usertype'], function () {
            Route::get('/', ['as' => 'usertype', 'uses' => "UserTypeController@index"]);
            Route::get('/create', ['as' => 'create-user', 'uses' => "UserTypeController@create"]);
            Route::post('/create', ['as' => 'store-user', 'uses' => "UserTypeController@store"]);
            Route::get('/edit/{id}', ['as' => 'edit-user', 'uses' => "UserTypeController@edit"]);
            Route::put('/update/{id}', ['as' => 'update-user', 'uses' => "UserTypeController@update"]);
            Route::delete('/delete/{id}', ['as' => 'delete-user', 'uses' => "UserTypeController@destroy"]);
        });
    });
});



//Members Routes
Route::group(['prefix' => 'member', 'namespace' => 'Members'], function () {

    Route::group(['prefix' => 'login'], function () {
        Route::get('/', ['as' => 'login-member', 'uses' => 'MemberController@login']);
        Route::post('/authenticate', ['as' => 'authenticate', 'uses' => 'MemberController@authenticate']);
        Route::post('/logout', ['as' => 'logout-member', 'uses' => 'MemberController@logout']);
    });

    Route::group(['prefix' => 'book-course'], function () {
        Route::get('/', ['as' => 'bookCourse', 'uses' => "BookcourseController@index"]);
        Route::get('/create/{id}', ['as' => 'book-create', 'uses' => "BookcourseController@create"]);
        Route::post('/store', ['as' => 'book-store', 'uses' => "BookcourseController@store"]);
    });

    Route::group(['prefix' => 'appointment'], function () {
        Route::get('/', ['as' => 'appointment', 'uses' => "AppointmentController@index"]);
        Route::get('/edit/{id}', ['as' => 'appointment-edit', 'uses' => "AppointmentController@edit"]);
        Route::put('/update/{id}', ['as' => 'appointment-update', 'uses' => "AppointmentController@update"]);
        Route::delete('/delete/{id}', ['as' => 'appointment-delete', 'uses' => "AppointmentController@destroy"]);
    });

    Route::group(['prefix' => 'invoice'], function () {
        Route::get('/', ['as' => 'invoice', 'uses' => "InvoiceController@index"]);
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', ['as' => 'profile', 'uses' => "ProfileController@index"]);
        Route::get('/edit/{id}', ['as' => 'profile-edit', 'uses' => "ProfileController@edit"]);
        Route::put('/update/{id}', ['as' => 'profile-update',  'uses' => "ProfileController@update"]);
    });
});
