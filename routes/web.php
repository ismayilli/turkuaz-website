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

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', 'PagesController@home');

Route::get('/catalog', 'PagesController@catalog');

Route::get('/product/{id}', 'PagesController@product');
Route::post('/orderconfirm/{id}','PagesController@orderConfirm');

Route::get('/contact', 'PagesController@contact');
Route::post('/contact', 'PagesController@sendMessage');

Route::get('/about', 'PagesController@about');

Route::get('/adminpanel','PagesController@admin')->middleware('auth');
Route::post('/adminpanel','PagesController@adminProduct');

//Route::get('admin/logout', 'Auth\LoginController@logout')->name('logout');

//Auth::routes();

Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::get('admin/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::middleware('auth')->group(function(){
    Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('admin/register', 'Auth\RegisterController@register');
});


// Password Reset Routes...
Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset');
