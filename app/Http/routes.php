<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('contact', 'PagesController@contact');
Route::get('admin', 'AdminController@index');


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
    # User
    Route::get('users', 'UserController@index');
    Route::get('users/create', 'UserController@getCreate');
    Route::post('users/create', 'UserController@postCreate');
    Route::get('users/{id}/edit', 'UserController@getEdit');
    Route::post('users/{id}/edit', 'UserController@postEdit');
    Route::get('users/{id}/delete', 'UserController@getDelete');
    Route::post('users/{id}/delete', 'UserController@postDelete');
    Route::get('users/data', 'UserController@data');
    
    # Employee
    Route::get('employee', 'EmployeeController@index');
    Route::get('employee/data', 'EmployeeController@data');
    Route::get('employee/create', 'EmployeeController@getCreate');
    Route::post('employee/create', 'EmployeeController@postCreate');
    Route::get('employee/{id}/edit', 'EmployeeController@getEdit');
    Route::post('employee/{id}/edit', 'EmployeeController@postEdit');
    Route::get('employee/{id}/delete', 'EmployeeController@getDelete');
    Route::post('employee/{id}/delete', 'EmployeeController@postDelete');
    Route::get('employee/{id}/view', 'EmployeeController@getView');
});
