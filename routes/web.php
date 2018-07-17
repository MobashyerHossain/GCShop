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
Route::view('/', 'multiAuth.consumer.pages.home')->name('index');
Route::post('/', 'Auth\LoginController@login')->name('login.submit');

//Model resources

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
  Route::get('/verification/{$id}', 'Auth\ConsumerControllers\ConsumerController@verifyAccount')->name('consumer.verify');

  //views

});

//Admin Routes
Route::prefix('admin')->group(function(){
  Route::get('/home', 'Auth\AdminControllers\AdminController@index')->name('admin.home')->middleware('auth:admin');

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
  Route::get('/home', 'Auth\ShowRoomStaffControllers\ShowRoomStaffController@index')->name('showroomstaff.home')->middleware('auth:showroomstaff');

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
  Route::view('/addproduct', 'multiAuth.showroomstaff.pages.addProduct')->name('addproduct')->middleware('auth:showroomstaff');
});

//Resource Routes
Route::resource('images', 'ImageController');
