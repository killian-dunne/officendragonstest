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

Route::get('company', 'CompanyController@index');
Route::get('tag', 'CompanyController@tags');
Route::post('{id}/tags','CompanyController@update_tags');
Route::get('company_tags', 'CompanyController@company_tags');
Route::post('company', 'CompanyController@store');
Route::put('company/{id}', 'CompanyController@update');
Route::get('company/destroy/{id}', 'CompanyController@destroy');
