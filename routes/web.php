<?php

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


Route::group(['prefix'=>'admin',], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'UseradminController@submitLogin']);
    Route::post('/afterLogin', 'UseradminController@login');
    Route::get('/logout', 'UseradminController@logout');
    Route::get('/dashboard', 'UseradminController@dashboard')->middleware('is_admin');
    Route::get('profile', ['as' => 'profile', 'uses' => 'UseradminController@profile'])->middleware('is_admin');
    Route::post('/profilesave', 'UseradminController@profilesave')->middleware('is_admin');
});




Route::get('/home', 'HomeController@index')->name('home');
