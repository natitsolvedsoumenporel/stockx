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
    Route::get('changepassword', ['as' => 'changepassword', 'uses' => 'UseradminController@changepassword'])->middleware('is_admin');
    Route::get('paymentsetting', ['as' => 'paymentsetting', 'uses' => 'UseradminController@paymentsetting'])->middleware('is_admin');
    Route::get('listcategory', ['as' => 'listcategory', 'uses' => 'CategoryadminController@listcategory'])->middleware('is_admin');
    Route::get('listsubcategory', ['as' => 'listsubcategory', 'uses' => 'CategoryadminController@listsubcategory'])->middleware('is_admin');
    Route::get('addparentcategory', ['as' => 'addparentcategory', 'uses' => 'CategoryadminController@addparentcategory'])->middleware('is_admin');
    Route::any('editcategory/{cate_id}', ['as' => 'editcategory', 'uses' => 'CategoryadminController@editcategory'])->middleware('is_admin');
    Route::get('addsubcategory', ['as' => 'addsubcategory', 'uses' => 'CategoryadminController@addsubcategory'])->middleware('is_admin');
    Route::any('editsubcategory/{cate_id}', ['as' => 'editsubcategory', 'uses' => 'CategoryadminController@editsubcategory'])->middleware('is_admin');
    Route::post('/profilesave', 'UseradminController@profilesave')->middleware('is_admin');
    Route::post('/passwordsave', 'UseradminController@passwordsave')->middleware('is_admin');
    Route::post('/savepayment', 'UseradminController@savepayment')->middleware('is_admin');
    Route::post('/saveparentcat', 'CategoryadminController@saveparentcat')->middleware('is_admin');
    Route::post('/saveparentcatedit/{cat_id}', 'CategoryadminController@saveparentcatedit')->middleware('is_admin');
    Route::get('/deletecategory/{cat_id}', 'CategoryadminController@deletecategory')->middleware('is_admin');
    Route::post('/savesubcat', 'CategoryadminController@savesubcat')->middleware('is_admin');
    Route::post('/savesubcatedit/{cat_id}', 'CategoryadminController@savesubcatedit')->middleware('is_admin');
    Route::get('/deletecategory/{cat_id}', 'CategoryadminController@deletecategory')->middleware('is_admin');
});




Route::get('/home', 'HomeController@index')->name('home');
