<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([ 'prefix' => 'auth'], function (){
    Route::group(['middleware' => ['guest:api']], function () {
        Route::post('login', 'API\AuthController@login');
        Route::post('signup', 'API\AuthController@signup');
    });
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'API\AuthController@logout');
        Route::get('getuser', 'API\AuthController@getUser');
    });
});


//Route::group([
//    'prefix' => 'auth'
//], function () {
//    Route::post('login', 'AuthController@login');
//    Route::post('signup', 'AuthController@signup');
//
//    Route::group([
//        'middleware' => 'auth:api'
//    ], function() {
//        Route::delete('logout', 'AuthController@logout');
//        Route::get('me', 'AuthController@user');
//    });
//});




//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//
////Route::get('todos', 'TodosController@index');
////Route::get('todos/{id}', 'TodosController@show');
////Route::post('todos', 'TodosController@store');
////Route::put('todos/{id}', 'TodosController@update');
////Route::delete('todos/{id}', 'TodosController@destroy');
//
//
////Route::get('/todos','TodosController@index')->name('todos.index');
////Route::get('/todos/create','TodosController@create')->name('todos.create');
////Route::post('/todos','TodosController@store')->name('todos.store'); // making a post request
////Route::get('/todos/{id}','TodosController@show')->name('todos.show');
////Route::get('/todos/{id}/edit','TodosController@edit')->name('todos.edit');
////Route::put('/todos/{id}','TodosController@update')->name('todos.update'); // making a put request
////Route::delete('/todos/{id}','TodosController@destroy')->name('todos.destroy'); // making a delete request
////
//
//
//
//
//
//Use App\Todo;
//
//Route::get('todo', function() {
//    // If the Content-Type and Accept headers are set to 'application/json',
//    // this will return a JSON structure. This will be cleaned up later.
//    return Todo::all();
//});
//
//Route::get('todo/{id}', function($id) {
//    return Todo::find($id);
//});
//
//Route::post('todo', function(Request $request) {
//    return Todo::create($request->all);
//});
//
//Route::put('todo/{id}', function(Request $request, $id) {
//    $article = Todo::findOrFail($id);
//    $article->update($request->all());
//
//    return $article;
//});
//
//Route::delete('todo/{id}', function($id) {
//    Todo::find($id)->delete();
//
//    return 204;
//});
//
//
//
//
//Route::group([
//    'prefix' => 'auth'
//], function () {
//    Route::post('login', 'AuthController@login');
//    Route::post('signup', 'AuthController@signup');
//
//    Route::group([
//        'middleware' => 'auth:api'
//    ], function() {
//        Route::delete('logout', 'AuthController@logout');
//        Route::get('me', 'AuthController@user');
//    });
//});
