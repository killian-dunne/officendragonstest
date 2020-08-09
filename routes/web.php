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

Route::get('/', [
    'uses' => 'CompanyController@index',
    'as' => 'company.index',
    'middleware' => 'auth'
]);

Route::group(['prefix' => 'user'], function() {
    Route::group(['middleware' => 'guest'], function() {
        Route::get('/signup', [
            'uses' => 'UserController@getSignup', 
            'as' => 'user.signup',
        ]);
        
        Route::post('/signup', [
            'uses' => 'UserController@postSignup', 
            'as' => 'user.signup'
        ]);
        
        Route::get('/signin', [
            'uses' => 'UserController@getSignin', 
            'as' => 'user.signin'
        ]);
        
        Route::post('/signin', [
            'uses' => 'UserController@postSignin', 
            'as' => 'user.signin'
        ]);
    });
    
    
    Route::get('/logout', [
        'uses' => 'UserController@getLogout', 
        'as' => 'user.logout',
        'middleware' => 'auth'
    ]);
});

Route::resource('company', 'CompanyController');

