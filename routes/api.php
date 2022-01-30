<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'uroles'], function() {
   Route::get('all', 'App\Http\Controllers\RoleUserController@index');
   Route::get('join', 'App\Http\Controllers\RoleUserController@join');
});

Route::group(['prefix' => 'users'], function() {
    Route::get('all', 'App\Http\Controllers\UserController@index');
    Route::get('search/{id}', 'App\Http\Controllers\UserController@getRoletoUserId');
    Route::get('data/{id}', 'App\Http\Controllers\UserController@getUserData');
    Route::post('add', 'App\Http\Controllers\UserController@addUser');
    Route::put('update/{id}', 'App\Http\Controllers\UserController@updateUser');
    Route::delete('delete/{id}', 'App\Http\Controllers\UserController@deleteUser');
});


Route::group(['prefix' => 'roles'], function() {
    Route::get('all', 'App\Http\Controllers\RoleController@index');
    Route::get('search/{id}', 'App\Http\Controllers\RoleController@findRole');
    Route::post('add', 'App\Http\Controllers\RoleController@createRole');
    Route::put('update/{id}', 'App\Http\Controllers\RoleController@editRole');
    Route::delete('delete/{id}', 'App\Http\Controllers\RoleController@deleteRole');
});
