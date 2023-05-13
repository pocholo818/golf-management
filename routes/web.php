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
        Route::get('/', ['as' => 'login_admin', 'uses' => 'AuthenticateController@login']);
        Route::post('/authenticated', ['as' => 'authenticated', 'uses' => 'AuthenticateController@authenticated']);
    });

    //Authenticated Routes
    Route::group(['middleware' => ['admin.auth']], function () {
        Route::post('/logout', ['as' => 'logout_admin', 'uses' => 'AuthenticateController@logout',]);

        Route::group(['prefix' => 'member',], function () {
            Route::get('/', ['as' => 'member', 'uses' => "MemberController@index"]);
            Route::get('/create', ['as' => 'create_member', 'uses' => "MemberController@create"]);
            Route::post('/create', ['as' => 'store_member', 'uses' => "MemberController@store"]);
            Route::get('/edit/{id}', ['as' => 'edit_member', 'uses' => "MemberController@edit"]);
            Route::put('/update/{id}', ['as' => 'update_member', 'uses' => "MemberController@update"]);
            Route::delete('/delete/{id}', ['as' => 'delete_member', 'uses' => "MemberController@destroy"]);
        });

        Route::group(['prefix' => 'appointment'], function () {
            Route::get('/', ['as' => 'appointments', 'uses' => "AppointmentController@index"]);
            Route::put('/edit/{id}', ['as' => 'accept', 'uses' => "AppointmentController@accept"]);
            Route::put('/decline/{id}', ['as' => 'decline', 'uses' => "AppointmentController@decline"]);
        });

        //Crud golf course
        Route::group(['prefix' => 'course'], function () {
            Route::get('/', ['as' => 'course', 'uses' => "CourseController@index"]);
            Route::get('/create', ['as' => 'create_course', 'uses' => "CourseController@create"]);
            // Route::namespace('courseCreate')->get('/create', "Admin\CourseController@create");
            Route::post('/create', ['as' => 'store_course', 'uses' => "CourseController@store"]);
            Route::get('/edit/{id}', ['as' => 'edit_course', 'uses' => "CourseController@edit"]);
            Route::put('/update/{id}', ['as' => 'update_course', 'uses' => "CourseController@update"]);
            Route::delete('/delete/{id}', ['as' => 'delete_course', 'uses' => "CourseController@destroy"]);
        });

        Route::group(['prefix' => 'schedules'], function () {
            Route::get('/', ['as' => 'schedules', 'uses' => "ScheduleController@index"]);
        });

        Route::group(['prefix' => 'finance'], function () {
            Route::get('/', ['as' => 'finance', 'uses' => "FinanceController@index"]);
        });

        Route::group(['prefix' => 'services'], function () {
            Route::get('/', ['as' => 'services', 'uses' => "ServicesController@index"]);
            Route::get('/create', ['as' => 'create_services', 'uses' => "ServicesController@create"]);
            Route::post('/create', ['as' => 'store_services', 'uses' => "ServicesController@store"]);
            Route::get('/edit/{id}', ['as' => 'edit_services', 'uses' => "ServicesController@edit"]);
            Route::put('/update/{id}', ['as' => 'update_services', 'uses' => "ServicesController@update"]);
            Route::delete('/delete/{id}', ['as' => 'delete_services', 'uses' => "ServicesController@destroy"]);
       
        });

        Route::group(['prefix' => 'merchandise'], function () {
            Route::get('/', ['as' => 'merchandise', 'uses' => "MerchandiseController@index"]);
            Route::get('/create', ['as' => 'create_merchandise', 'uses' => "MerchandiseController@create"]);
            Route::post('/create', ['as' => 'store_merchandise', 'uses' => "MerchandiseController@store"]);
            Route::get('/edit/{id}', ['as' => 'edit_merchandise', 'uses' => "MerchandiseController@edit"]);
            Route::put('/update/{id}', ['as' => 'update_merchandise', 'uses' => "MerchandiseController@update"]);
            Route::delete('/delete/{id}', ['as' => 'delete_merchandise', 'uses' => "MerchandiseController@destroy"]);
        });

        //Kiosk
        Route::group(['prefix' => 'kiosk'], function () {
            Route::get('/', ['as' => 'kiosk', 'uses' => "KioskController@index"]);
            Route::get('/search', ['as' => 'search_kiosk', 'uses' => "KioskController@search"]);
            Route::get('/create/{id}', ['as' => 'create_kiosk', 'uses' => "KioskController@create"]);
            Route::post('/create', ['as' => 'store_kiosk', 'uses' => "KioskController@store"]);
            Route::get('/edit/{id}', ['as' => 'edit_kiosk', 'uses' => "KioskController@edit"]);
            Route::put('/update/{id}', ['as' => 'update_kiosk', 'uses' => "KioskController@update"]);
            Route::delete('/delete/{id}', ['as' => 'delete_kiosk', 'uses' => "KioskController@destroy"]);
        });

        Route::group(['prefix' => 'accounts'], function () {
            Route::get('/', ['as' => 'account', 'uses' => "AccountTypeController@index"]);
            Route::get('/create', ['as' => 'create_user', 'uses' => "AccountTypeController@create"]);
            Route::post('/create', ['as' => 'store_user', 'uses' => "AccountTypeController@store"]);
            Route::get('/edit/{id}', ['as' => 'edit_user', 'uses' => "AccountTypeController@edit"]);
            Route::put('/update/{id}', ['as' => 'update_user', 'uses' => "AccountTypeController@update"]);
            Route::delete('/delete/{id}', ['as' => 'delete_user', 'uses' => "AccountTypeController@destroy"]);
        });

        Route::group(['prefix' => 'invoice'], function () {
            Route::get('/', ['as' => 'admin_invoice', 'uses' => "InvoiceController@index"]);
            Route::get('/create', ['as' => 'create_invoice', 'uses' => "InvoiceController@create"]);
            Route::get('/preview', ['as' => 'receipt_preview', 'uses' => "InvoiceController@preview"]);
            Route::get('/generate', ['as' => 'generate_receipt', 'uses' => "InvoiceController@generate"]);
        });


    });
});

//Members Routes
Route::group(['prefix' => 'member', 'namespace' => 'Members'], function () {

    Route::group(['prefix' => 'login', 'middleware' => 'member.guest'], function () {
        Route::get('/', ['as' => 'login-member', 'uses' => 'AuthenticateController@login']);
        Route::post('/authenticate', ['as' => 'authenticate', 'uses' => 'AuthenticateController@authenticate']);
       
    });

    //Authenticated Routes
      Route::group(['middleware' => ['member.auth']], function () {
        Route::post('/logout', ['as' => 'logout-member', 'uses' => 'AuthenticateController@logout']);

    Route::group(['prefix' => 'book-course'], function () {
        Route::get('/', ['as' => 'bookCourse', 'uses' => "CourseController@index"]);

    });

    Route::group(['prefix' => 'appointment'], function () {
        Route::get('/', ['as' => 'appointment', 'uses' => "AppointmentController@index"]);
        Route::get('/edit/{id}', ['as' => 'appointment-edit', 'uses' => "AppointmentController@edit"]);
        Route::put('/update/{id}', ['as' => 'appointment-update', 'uses' => "AppointmentController@update"]);
        Route::get('/create/{id}', ['as' => 'appointment-create', 'uses' => "AppointmentController@create"]);
        Route::post('/store', ['as' => 'appointment-store', 'uses' => "AppointmentController@store"]);
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
});
