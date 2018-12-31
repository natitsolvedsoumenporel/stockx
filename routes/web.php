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
    return view('home');
    //Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
});
Route::get('/login', 'HomeController@login');
Route::get('/signup', 'HomeController@signup');
Route::get('/active/{id}', 'HomeController@active');
Route::get('/recoveraccount/{id}', 'HomeController@recoveraccount');
Route::get('/forgetpassword', 'HomeController@forgetpassword');
Route::any('/afterloginfrontend', 'HomeController@afterloginfrontend');
Route::any('/aftersignupfrontend', 'HomeController@aftersignupfrontend');
Route::any('/changepassmailsend', 'HomeController@changepassmailsend');
Route::any('/resetpassword', 'HomeController@resetpassword');
Route::any('/profile', 'UserController@profile');
Route::any('/savedetails', 'UserController@savedetails');
Route::any('/savepass', 'UserController@savepass');
Route::get('/editprofile', 'UserController@editprofile');
Route::get('/profilepass', 'UserController@profilepass');
Route::any('/product_list', 'HomeController@product_list');
Route::any('/logout', 'HomeController@logout');
Route::any('/get_subcat', 'HomeController@get_subcat');

Route::any('/how_it_works_page', 'HomeController@how_it_works');
Route::any('/get_subsizelist', 'ProductController@get_subsizelist');
Route::any('/details/{id}', 'ProductController@details');
Route::any('/allsize/{id}', 'ProductController@allsize');


Route::any('/product_search', 'HomeController@product_search');


Route::group(['prefix'=>'admin',], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'UseradminController@submitLogin']);
    Route::post('/afterLogin', 'UseradminController@login');
    Route::get('/logout', 'UseradminController@logout');
    Route::get('/dashboard', 'UseradminController@dashboard')->middleware('is_admin');
    Route::get('profile', ['as' => 'profile', 'uses' => 'UseradminController@profile'])->middleware('is_admin');
    Route::get('editsite', ['as' => 'editsite', 'uses' => 'UseradminController@editsite'])->middleware('is_admin');
    Route::get('listusers', ['as' => 'listusers', 'uses' => 'UseradminController@listusers'])->middleware('is_admin');
    Route::get('adduser', ['as' => 'adduser', 'uses' => 'UseradminController@adduser'])->middleware('is_admin');
    Route::get('changepassword', ['as' => 'changepassword', 'uses' => 'UseradminController@changepassword'])->middleware('is_admin');
    Route::get('paymentsetting', ['as' => 'paymentsetting', 'uses' => 'UseradminController@paymentsetting'])->middleware('is_admin');
    Route::get('listcategory', ['as' => 'listcategory', 'uses' => 'CategoryadminController@listcategory'])->middleware('is_admin');
    Route::get('listsubcategory', ['as' => 'listsubcategory', 'uses' => 'CategoryadminController@listsubcategory'])->middleware('is_admin');
    Route::get('listattribute', ['as' => 'listattribute', 'uses' => 'AttributeController@listattribute'])->middleware('is_admin');
    Route::get('listsize', ['as' => 'lissize', 'uses' => 'SizeController@listsize'])->middleware('is_admin');
    Route::get('showsizelist/{shoesize}', ['as' => 'showsizelist', 'uses' => 'SizeController@showsizelist'])->middleware('is_admin');
    Route::get('listemail', ['as' => 'listemail', 'uses' => 'EmailtemplateController@listemail'])->middleware('is_admin');
    Route::get('listcolor', ['as' => 'listemail', 'uses' => 'ColorController@listcolor'])->middleware('is_admin');
    Route::get('listbrand', ['as' => 'listbrand', 'uses' => 'BrandController@listbrand'])->middleware('is_admin');
    
    
    
    Route::get('addparentcategory', ['as' => 'addparentcategory', 'uses' => 'CategoryadminController@addparentcategory'])->middleware('is_admin');
    Route::any('editcategory/{cate_id}', ['as' => 'editcategory', 'uses' => 'CategoryadminController@editcategory'])->middleware('is_admin');
    Route::get('addsubcategory', ['as' => 'addsubcategory', 'uses' => 'CategoryadminController@addsubcategory'])->middleware('is_admin');
    Route::any('editsubcategory/{cate_id}', ['as' => 'editsubcategory', 'uses' => 'CategoryadminController@editsubcategory'])->middleware('is_admin');
    Route::any('edituser/{user_id}', ['as' => 'edituser', 'uses' => 'UseradminController@edituser'])->middleware('is_admin');
    Route::get('addattribute', ['as' => 'addattribute', 'uses' => 'AttributeController@addattribute'])->middleware('is_admin');
    Route::any('editattribute/{attribute_id}', ['as' => 'editattribute', 'uses' => 'AttributeController@editattribute'])->middleware('is_admin');
    
    Route::get('addsize', ['as' => 'addsize', 'uses' => 'SizeController@addsize'])->middleware('is_admin');
    Route::get('addsizenumber', ['as' => 'addsizenumber', 'uses' => 'SizeController@addsizenumber'])->middleware('is_admin');
    Route::any('editsize/{size_id}', ['as' => 'editsize', 'uses' => 'SizeController@editsize'])->middleware('is_admin');
    Route::any('editsizenumber/{size_id}', ['as' => 'editsizenumber', 'uses' => 'SizeController@editsizenumber'])->middleware('is_admin');
    
    Route::get('addemail', ['as' => 'addemail', 'uses' => 'EmailtemplateController@addemail'])->middleware('is_admin');
    Route::any('editemail/{email_id}', ['as' => 'editemail', 'uses' => 'EmailtemplateController@editemail'])->middleware('is_admin');
    Route::post('/addemailsave', 'EmailtemplateController@addemailsave')->middleware('is_admin');
    Route::post('/editemailsave/{email_id}', 'EmailtemplateController@editemailsave')->middleware('is_admin');
    Route::any('/deleteemail/{email_id}', 'EmailtemplateController@deleteemail')->middleware('is_admin');
    
    Route::get('addbrand', ['as' => 'addbrand', 'uses' => 'BrandController@addbrand'])->middleware('is_admin');
    Route::any('editbrand/{brand_id}', ['as' => 'editbrand', 'uses' => 'BrandController@editbrand'])->middleware('is_admin');
    Route::post('/addbrandsave', 'BrandController@addbrandsave')->middleware('is_admin');
    Route::post('/editbrandsave/{brand_id}', 'BrandController@editbrandsave')->middleware('is_admin');
    Route::any('/deletebrand/{brand_id}', 'BrandController@deletebrand')->middleware('is_admin');
    
    Route::get('addcolor', ['as' => 'addcolor', 'uses' => 'ColorController@addcolor'])->middleware('is_admin');
    Route::any('editcolor/{color_id}', ['as' => 'editcolor', 'uses' => 'ColorController@editcolor'])->middleware('is_admin');
    Route::post('/addcolorsave', 'ColorController@addcolorsave')->middleware('is_admin');
    Route::post('/editcolorsave/{color_id}', 'ColorController@editcolorsave')->middleware('is_admin');
    Route::any('/deletecolor/{color_id}', 'ColorController@deletecolor')->middleware('is_admin');
    
    
    Route::any('viewuser/{ur_id}', ['as' => 'viewuser', 'uses' => 'UseradminController@viewuser'])->middleware('is_admin');
    Route::any('statususer/{ur_id}', ['as' => 'statususer', 'uses' => 'UseradminController@statususer'])->middleware('is_admin');
    Route::any('deleteuser/{ur_id}', ['as' => 'deleteuser', 'uses' => 'UseradminController@deleteuser'])->middleware('is_admin');
    
    Route::post('/profilesave', 'UseradminController@profilesave')->middleware('is_admin');
    Route::post('/sitesave', 'UseradminController@sitesave')->middleware('is_admin');
    Route::post('/passwordsave', 'UseradminController@passwordsave')->middleware('is_admin');
    Route::post('/savepayment', 'UseradminController@savepayment')->middleware('is_admin');
    
    Route::post('/saveattribute', 'AttributeController@saveattribute')->middleware('is_admin');
    Route::post('/savesize', 'SizeController@savesize')->middleware('is_admin');
    Route::post('/savesizenumber', 'SizeController@savesizenumber')->middleware('is_admin');
    Route::post('/saveattributeedit/{atb_id}', 'AttributeController@saveattributeedit')->middleware('is_admin');
    Route::post('/savesizeedit/{atb_id}', 'SizeController@savesizeedit')->middleware('is_admin');
    Route::post('/savesizenumedit/{atb_id}', 'SizeController@savesizenumedit')->middleware('is_admin');
    Route::any('/deleteattribute/{atb_id}', 'AttributeController@deleteattribute')->middleware('is_admin');
    Route::any('/deletesize/{atb_id}', 'SizeController@deletesize')->middleware('is_admin');
    Route::any('/deletesizenumber/{atb_id}', 'SizeController@deletesizenumber')->middleware('is_admin');
    
    Route::post('/saveparentcat', 'CategoryadminController@saveparentcat')->middleware('is_admin');
    Route::post('/saveparentcatedit/{cat_id}', 'CategoryadminController@saveparentcatedit')->middleware('is_admin');
    
    Route::get('/deletecategory/{cat_id}', 'CategoryadminController@deletecategory')->middleware('is_admin');
    Route::post('/savesubcat', 'CategoryadminController@savesubcat')->middleware('is_admin');
    Route::post('/saveuser', 'UseradminController@saveuser')->middleware('is_admin');
    Route::post('/saveuseredit/{u_id}', 'UseradminController@saveuseredit')->middleware('is_admin');
    Route::post('/savesubcatedit/{cat_id}', 'CategoryadminController@savesubcatedit')->middleware('is_admin');
    Route::get('/deletecategory/{cat_id}/{cat_type}', 'CategoryadminController@deletecategory')->middleware('is_admin');
});




Route::get('/home', 'HomeController@index')->name('home');
