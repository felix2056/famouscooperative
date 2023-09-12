<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::match(['get', 'post'], '/register', 'AuthController@register')->name('register');
Route::match(['get', 'post'], '/login', 'AuthController@login')->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/activities', 'DashboardController@activities')->name('dashboard.activities');
    Route::get('/knowledge-base', 'DashboardController@knowledgeBase')->name('dashboard.knowledge-base');
    Route::post('/logout', 'AuthController@logout')->name('logout');

    Route::group(['prefix' => 'clients'], function () {
        Route::get('/', 'ClientController@index')->name('dashboard.clients');
        Route::get('{slug}/profile', 'ClientController@profile')->name('dashboard.clients.profile');

        Route::post('/store', 'ClientController@store')->name('dashboard.clients.store');
        Route::post('/{client}/update', 'ClientController@update')->name('dashboard.clients.update');
        Route::post('/{client}/delete', 'ClientController@destroy')->name('dashboard.clients.destroy');

        // Records routes
        Route::group(['prefix' => '{slug}/records'], function () {
            Route::get('/', 'RecordController@index')->name('dashboard.clients.records');
            Route::get('/create', 'RecordController@create')->name('dashboard.clients.records.create');
            Route::get('/{record}/edit', 'RecordController@edit')->name('dashboard.clients.records.edit');

            Route::post('/store', 'RecordController@store')->name('dashboard.clients.records.store');
            Route::post('/update', 'RecordController@update')->name('dashboard.clients.records.update');
            Route::post('/{record}/delete', 'RecordController@destroy')->name('dashboard.clients.records.destroy');
        });
    });

    Route::group(['prefix' => 'employees'], function () {
        Route::get('/', 'EmployeeController@index')->name('dashboard.employees');
        Route::get('{slug}/profile', 'EmployeeController@profile')->name('dashboard.employees.profile');
        
        Route::post('/store', 'EmployeeController@store')->name('dashboard.employees.store');
        Route::post('/{employee}/update', 'EmployeeController@update')->name('dashboard.employees.update');
        Route::post('/{employee}/delete', 'EmployeeController@destroy')->name('dashboard.employees.destroy');

        Route::post('/{employee}/update-personal', 'EmployeeController@updatePersonal')->name('dashboard.employees.update-personal');

        // Designations
        Route::group(['prefix' => 'designations'], function () {
            Route::get('/', 'DesignationController@index')->name('dashboard.employees.designations');
            Route::post('/store', 'DesignationController@store')->name('dashboard.employees.designations.store');
            Route::post('/{designation}/update', 'DesignationController@update')->name('dashboard.employees.designations.update');
            Route::post('/{designation}/delete', 'DesignationController@destroy')->name('dashboard.employees.designations.destroy');
        });
    });

    Route::group(['middleware' => ['admin']], function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::match(['get', 'post'], '/company-settings', 'DashboardController@companySettings')->name('dashboard.admin.company-settings');
            Route::match(['get', 'post'], '/theme-settings', 'DashboardController@themeSettings')->name('dashboard.admin.theme-settings');

            Route::get('/users', 'DashboardController@users')->name('dashboard.admin.users');
        });
    });

    Route::group(['prefix' => 'tickets'], function () {
        Route::get('/', 'TicketController@index')->name('dashboard.tickets');
        Route::post('/store', 'TicketController@store')->name('dashboard.tickets.store');
        Route::get('/{slug}/show', 'TicketController@show')->name('dashboard.tickets.show');
        Route::get('/{ticket}/update', 'TicketController@update')->name('dashboard.tickets.update');
        Route::post('/{ticket}/delete', 'TicketController@destroy')->name('dashboard.tickets.destroy');
        Route::post('/{ticket}/send-message', 'TicketController@sendMessage')->name('dashboard.tickets.send-message');
    });
});