<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('AuthAdmin')->group(function () {
        Route::get('/companies', 'CompaniesController@index')->name('companies');
        Route::post('/companies/create', 'CompaniesController@store');
        Route::post('/companies/update', 'CompaniesController@update');
        Route::get('/companies/delete/{id}', 'CompaniesController@destroy');
        Route::get('/employees', 'EmployeesController@index')->name('employees');
        Route::post('/employees/create', 'EmployeesController@store');
        Route::post('/employees/update', 'EmployeesController@update');
        Route::get('/employees/delete/{id}', 'EmployeesController@destroy');
    });