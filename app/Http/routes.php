<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	'as'	=>	'home',
	'uses' 	=>	'PagesController@index'
]);

Route::get('/articles', [
	'as'	=>	'articles.index',
	'uses'	=>	'ArticlesController@index'
]);

// Create Articles 
Route::get('/articles/create',	[
	'middleware' => 'auth',
	'as' => 'articles.create',
	'uses' => 'ArticlesController@create'
]);

Route::post('/articles/store',[
	'as' => 'articles.store',
	'uses' => 'ArticlesController@store'
]);

// Edit Articles
Route::get('/articles/{id}/edit/', [
	'middleware' => 'auth',
	'as' => 'articles.edit',
	'uses' => 'ArticlesController@edit'
]);

Route::put('/articles/{id}',[
	'as' => 'articles.update',
	'uses' => 'ArticlesController@update'	
]);

// Delete Articles
Route::delete('/articles/{id}',[
	'middleware' => 'auth',
	'as' => 'articles.destroy',
	'uses' => 'ArticlesController@destroy'	
]);

Route::get('/articles/{id}', [
	'as' 	=>	'article.show',
	'uses' 	=>	'ArticlesController@show'
]);

// Registeration routes 
Route::get('/auth/register',[
	'as' => 'auth.register.get',
	'uses' => 'Auth\AuthController@getRegister'
]);
Route::post('/auth/register',[
	'as' => 'auth.register.post',
	'uses' => 'Auth\AuthController@postRegister'
]);


// Login routes 
Route::get('/auth/login',[
	'as' => 'auth.login.get',
	'uses' => 'Auth\AuthController@getLogin'
]);
Route::post('/auth/login',[
	'as' => 'auth.login.post',
	'uses' => 'Auth\AuthController@postLogin'
]);
Route::get('/auth/logout',[
	'as' => 'auth.logout',
	'uses' => 'Auth\AuthController@getLogout'
]);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

