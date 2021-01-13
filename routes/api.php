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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('report/admin', '\App\Http\Controllers\ReportController@get_all_report');
Route::get('report/{id}', '\App\Http\Controllers\ReportController@get_detail_report');
Route::delete('report/delete/{id}', '\App\Http\Controllers\ReportController@delete_data_report');
Route::get('report/user/{email}', '\App\Http\Controllers\ReportController@get_user_report');
Route::post('report/insert', '\App\Http\Controllers\ReportController@insert_data_report');
Route::post('user/register', '\App\Http\Controllers\UserController@register');
Route::get('user/role/{email}', '\App\Http\Controllers\UserController@checkRole');
Route::get('user/username/{email}', '\App\Http\Controllers\UserController@checkUsername');
Route::get('user/{email}', '\App\Http\Controllers\UserController@readUser');
Route::get('user/profile/{email}', '\App\Http\Controllers\UserController@getProfile');