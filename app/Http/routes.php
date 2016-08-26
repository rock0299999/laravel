<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/*
Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');

    Route::auth();

});
*/

Route::get('AA', 'Test2Controller@index');

Route::get('EX/IN', 'ExcelController@index');//excel

Route::match(['get', 'post'], '/', function () {
	return 'Hello World';
});
/*	Route::get('user/{id?}', function ($id = null) {
		return 'User '.$id;
	});	
	*/
		Route::get('user/{name?}', function ($name = null) {
		return 'qq'.$name;
	});
		/*Route::get('user/{name?}', function ($name = 'John') {
			return $name;
		});	
*/
	//rock add excel 
	Route::get('EX/ET','ExcelController@export');
	Route::any('EX/IT','ExcelController@import');
 