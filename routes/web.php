<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'FrontController@index')->name('home');
Route::get('/shirts', 'FrontController@shirts')->name('shirts');
Route::get('/shirt', 'FrontController@shirt')->name('shirt');



Route::get('/sendemail', 'SendEmailController@index')->name('sendemail');
Route::post('/sendemail/send', 'SendEmailController@send')->name('mailing');


Route::get('/home', 'HomeController@index');
Route::resource('cart','CartController');
Route::get('/cart{id}', 'CartController@edit')->name('cart.add');


Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function()
{
  Route::get('/login', 'Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  //amin panal
  Route::resource('product' , 'ProductsController');
  Route::resource('category','CategoriesController');

  // Password reset routes
/*Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

*/
  Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
});

