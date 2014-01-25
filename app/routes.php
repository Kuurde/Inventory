<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('list', array('as' => 'list', 'before' => 'auth.basic', 'uses' => 'ItemController@listItems'));

Route::get('new', array('as' => 'getNew', 'before' => 'auth.basic', 'uses' => 'ItemController@getNew'));

Route::post('new', array('as' => 'postNew', 'before' => 'auth.basic', 'uses' => 'ItemController@postNew'));

Route::get('edit/{id}', array('as' => 'getEdit', 'before' => 'auth.basic', 'uses' => 'ItemController@getEdit'));

Route::post('edit/{id}', array('as' => 'postEdit', 'before' => 'auth.basic', 'uses' => 'ItemController@postEdit'));

Route::get('delete/{id}', array('as' => 'delete', 'before' => 'auth.basic', 'uses' => 'ItemController@deleteItem'));
