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

//Index Route
Route::get('/', 'Auth\ConsumerControllers\ConsumerController@index')->name('index');
Route::post('/', 'Auth\LoginController@login')->name('login.submit');

//Resource Routes
Route::resource('images', 'ModelControllers\ImageController');
Route::resource('myfavourites', 'ModelControllers\MyFavouriteController');
Route::resource('carts', 'ModelControllers\CartController');

//Consumer Routes
Route::prefix('consumer')->group(function(){
  Route::get('/home', 'Auth\ConsumerControllers\ConsumerController@index')->name('consumer.home');

  //Auth Routes
    //login
  Route::get('/', 'Auth\ConsumerControllers\ConsumerLoginController@show')->name('consumer.login');
  Route::post('/', 'Auth\ConsumerControllers\ConsumerLoginController@login')->name('consumer.login.submit');
  Route::get('/logout', 'Auth\ConsumerControllers\ConsumerLoginController@consumerLogout')->name('consumer.logout');
    //register
  Route::get('/register', 'Auth\ConsumerControllers\ConsumerRegisterController@show')->name('consumer.register');
  Route::post('/register', 'Auth\ConsumerControllers\ConsumerRegisterController@register')->name('consumer.register.submit');
    //password reset
  Route::post('/password/email', 'Auth\ConsumerControllers\ConsumerForgotPasswordController@sendResetLinkEmail')->name('consumer.password.email');
  Route::get('/password/reset', 'Auth\ConsumerControllers\ConsumerForgotPasswordController@showLinkRequestForm')->name('consumer.password.request');
  Route::post('/password/reset', 'Auth\ConsumerControllers\ConsumerResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\ConsumerControllers\ConsumerResetPasswordController@showResetForm')->name('consumer.password.reset');
    //verification
  Route::get('/verification/{id}', 'Auth\ConsumerControllers\ConsumerController@verifyAccount')->name('consumer.verify');

  //views

});

//Admin Routes
Route::prefix('admin')->group(function(){
  Route::get('/dashboard', 'Auth\AdminControllers\AdminController@index')->name('admin.dashboard')->middleware('auth:admin');
  Route::get('/profile', 'Auth\AdminControllers\AdminController@profile')->name('admin.profile')->middleware('auth:admin');

  //Auth Routes
    //login
  Route::get('/', 'Auth\AdminControllers\AdminLoginController@show')->name('admin.login');
  Route::post('/', 'Auth\AdminControllers\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/logout', 'Auth\AdminControllers\AdminLoginController@adminLogout')->name('admin.logout');
    //password reset
  Route::post('/password/email', 'Auth\AdminControllers\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminControllers\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminControllers\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminControllers\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    //verification
  Route::get('/verify', 'Auth\AdminControllers\AdminController@verifyAccount')->name('admin.verify');

  //views

});

//Show Room Routes
Route::prefix('showroomstaff')->group(function(){
  Route::get('/dashboard', 'Auth\ShowRoomStaffControllers\ShowRoomStaffController@index')->name('showroomstaff.dashboard')->middleware('auth:showroomstaff');

  //Auth Routes
    //login
  Route::get('/', 'Auth\ShowRoomStaffControllers\ShowRoomStaffLoginController@show')->name('showroomstaff.login');
  Route::post('/', 'Auth\ShowRoomStaffControllers\ShowRoomStaffLoginController@login')->name('showroomstaff.login.submit');
  Route::get('/logout', 'Auth\ShowRoomStaffControllers\ShowRoomStaffLoginController@showroomstaffLogout')->name('showroomstaff.logout');
    //password reset
  Route::post('/password/email', 'Auth\ShowRoomStaffControllers\ShowRoomStaffForgotPasswordController@sendResetLinkEmail')->name('showroomstaff.password.email');
  Route::get('/password/reset', 'Auth\ShowRoomStaffControllers\ShowRoomStaffForgotPasswordController@showLinkRequestForm')->name('showroomstaff.password.request');
  Route::post('/password/reset', 'Auth\ShowRoomStaffControllers\ShowRoomStaffResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\ShowRoomStaffControllers\ShowRoomStaffResetPasswordController@showResetForm')->name('showroomstaff.password.reset');
    //verification
  Route::get('/verify', 'Auth\ShowRoomStaffControllers\ShowRoomStaffController@verifyAccount')->name('showroomstaff.verify');

  //views
  Route::view('/addproduct', 'multiAuth.showroomstaff.pages.addProduct')->name('addproduct');
});

//Oauth Route
Route::get('socialauth/{provider}', 'Auth\OauthController@redirectToProvider')->name('socialauth.redirect');
Route::get('socialauth/{provider}/callback', 'Auth\OauthController@handleProviderCallback')->name('socialauth.callback');

//Product Route
Route::prefix('product_details')->group(function(){
  //Car By Maker
  Route::get('car/maker/{carMakerId}', 'OtherControllers\ProductController@findMaker')->name('find.car.maker');
  Route::get('car_maker/{carMakerName}', 'OtherControllers\ProductController@showMaker')->name('show.car.maker');

  //Car By Model
  Route::get('car/model/{modelId}', 'OtherControllers\ProductController@findModel')->name('find.car.model');
  Route::get('car/{carMakerName}/{modelName}', 'OtherControllers\ProductController@showModel')->name('show.car.model');

  //Part By Category
  //Route::get('part/Category/{subCategoryId}', 'OtherControllers\ProductController@findCategory')->name('find.part.Category');
  //Route::get('part_category/{partCategoryName}', 'OtherControllers\ProductController@showCategory')->name('show.part.Category');

  //Part By Sub Category
  Route::get('part/subCategory/{subCategoryId}', 'OtherControllers\ProductController@findSubCategory')->name('find.part.subCategory');
  Route::get('part/{partCategoryName}/{subCategoryName}', 'OtherControllers\ProductController@showSubCategory')->name('show.part.subCategory');

  //Part By Manufacturer
  Route::get('part/manufacturer/{partManufacturerId}', 'OtherControllers\ProductController@findByManufacturer')->name('find.part.manufacturer');
  Route::get('part_manufacturer/{partManufacturerName}', 'OtherControllers\ProductController@showByManufacturer')->name('show.part.manufacturer');

  //Car Details
  Route::get('car/{carId}', 'OtherControllers\ProductController@findCar')->name('find.car.details');
  Route::get('car/{carMakerName}/{carModelName}/{carName}', 'OtherControllers\ProductController@showCar')->name('show.car.details');

  //Part Details
  Route::get('part/{partId}', 'OtherControllers\ProductController@findPart')->name('find.part.details');
  Route::get('part/{partCategoryName}/{partSubCategoryName}/{partManufacturerName}/{partName}', 'OtherControllers\ProductController@showPart')->name('show.part.details');
});
