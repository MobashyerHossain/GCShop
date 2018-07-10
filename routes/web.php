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

//Model resources

//Consumer Routes
Route::prefix('consumer')->group(function(){
  Route::get('/home', 'HomeControllers\ConsumerHomeController@index')->name('consumer.home');
  Route::get('/', 'Auth\ConsumerControllers\ConsumerLoginController@show')->name('consumer.login');
  Route::post('/', 'Auth\ConsumerControllers\ConsumerLoginController@login')->name('consumer.login.submit');
  Route::get('/logout', 'Auth\ConsumerControllers\ConsumerLoginController@consumerLogout')->name('consumer.logout');

  //Password Reset Routes
  Route::post('/password/email', 'Auth\ConsumerControllers\ConsumerForgotPasswordController@sendResetLinkEmail')->name('consumer.password.email');
  Route::get('/password/reset', 'Auth\ConsumerControllers\ConsumerForgotPasswordController@showLinkRequestForm')->name('consumer.password.request');
  Route::post('/password/reset', 'Auth\ConsumerControllers\ConsumerResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\ConsumerControllers\ConsumerResetPasswordController@showResetForm')->name('consumer.password.reset');

  //views

});

//Admin Routes
Route::prefix('admin')->group(function(){
  Route::get('/home', 'HomeControllers\AdminHomeController@index')->name('admin.home');
  Route::get('/', 'Auth\AdminControllers\AdminLoginController@show')->name('admin.login');
  Route::post('/', 'Auth\AdminControllers\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/logout', 'Auth\AdminControllers\AdminLoginController@adminLogout')->name('admin.logout');

  //Password Reset Routes
  Route::post('/password/email', 'Auth\AdminControllers\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminControllers\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminControllers\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminControllers\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

  //views

});

//Show Room Routes
Route::prefix('showroom')->group(function(){
  Route::get('/home', 'HomeControllers\ShowRoomHomeController@index')->name('showroom.home');
  Route::get('/', 'Auth\ShowRoomControllers\ShowRoomLoginController@show')->name('showroom.login');
  Route::post('/', 'Auth\ShowRoomControllers\ShowRoomLoginController@login')->name('showroom.login.submit');
  Route::get('/logout', 'Auth\ShowRoomControllers\ShowRoomLoginController@showroomLogout')->name('showroom.logout');

  //Password Reset Routes
  Route::post('/password/email', 'Auth\ShowRoomControllers\ShowRoomForgotPasswordController@sendResetLinkEmail')->name('showroom.password.email');
  Route::get('/password/reset', 'Auth\ShowRoomControllers\ShowRoomForgotPasswordController@showLinkRequestForm')->name('showroom.password.request');
  Route::post('/password/reset', 'Auth\ShowRoomControllers\ShowRoomResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\ShowRoomControllers\ShowRoomResetPasswordController@showResetForm')->name('showroom.password.reset');

  //views
  Route::view('/addproduct', 'multiAuth.showrooms.pages.addProduct')->name('addproduct');
});
