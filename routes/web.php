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


/**
 * Todo Route(s)
 */
//Route::resource('/todos','TodosController');

/**
 * Pages Route(s)
 */

/**
 * Pages Route(s)
 */
Route::get('/','PagesController@index')->name('pages.index');
Route::get('/about','PagesController@about')->name('pages.about');
Route::get('/pricing','PagesController@pricing')->name('pages.pricing');
Route::get('/news','PagesController@news')->name('pages.news');
Route::get('/cats','PagesController@cats')->name('pages.cats');
Route::get('/news-detail/{id}','PagesController@showDetail')->name('pages.news-detail');
Route::get('/cats-detail/{id}','PagesController@showProjectDetail')->name('pages.cats-detail');


Route::get('/contact','PagesController@contact')->name('pages.contact');
Route::post('/contact', 'PagesController@saveContact')->name('pages.saveContact');

//
Route::get('/todos/create','TodosController@create')->name('todos.create');
Route::post('/todos','TodosController@store')->name('todos.store'); // making a post request
Route::get('/todos/{id}','TodosController@show')->name('todos.show');
Route::get('/todos/{id}/edit','TodosController@edit')->name('todos.edit');
Route::put('/todos/{id}','TodosController@update')->name('todos.update'); // making a put request
Route::delete('/todos/{id}','TodosController@destroy')->name('todos.destroy'); // making a delete request

Route::get('/projects','ProjectsController@index')->name('projects.index');
Route::get('/projects/create','ProjectsController@create')->name('projects.create');
Route::post('/projects','ProjectsController@store')->name('projects.store'); // making a post request
Route::get('/projects/{id}','ProjectsController@show')->name('projects.show');
Route::get('/projects/{id}/edit','ProjectsController@edit')->name('projects.edit');
Route::put('/projects/{id}','ProjectsController@update')->name('projects.update'); // making a put request
Route::delete('/projects/{id}','ProjectsController@destroy')->name('projects.destroy'); // making a delete request


Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/profile','ProfileController@index')->name('profile.index');
Route::put('/profile','ProfileController@update')->name('profile.update');
Route::get('/todos','TodosController@index')->name('todos.index');

/**
 * Login Route(s)
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/**
 * Register Route(s)
 */
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

/**
 * Password Reset Route(S)
 */
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

/**
 * Email Verification Route(s)
 */
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/home', 'HomeController@index')->name('home');


/**
 * Product Route(s)
 */
Route::get('/product','ProductController@index')->name('product.index');
Route::post('/product','ProductController@store')->name('product.store')->middleware('auth.admin');
Route::get('product/create', 'ProductController@create')->name('product.create')->middleware('auth.admin');
Route::get('product/{product}', 'ProductController@show')->name('product.show');
