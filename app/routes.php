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

Route::get('list', array('as' => 'list', 'uses' => 'ItemController@listItems'));

Route::get('new', array('as' => 'getNew', 'uses' => 'ItemController@getNew'));

Route::post('new', array('as' => 'postNew', 'uses' => 'ItemController@postNew'));

Route::get('edit/{id}', array('as' => 'getEdit', 'uses' => 'ItemController@getEdit'));

Route::post('edit/{id}', array('as' => 'postEdit', 'uses' => 'ItemController@postEdit'));

Route::get('delete/{id}', array('as' => 'delete', 'uses' => 'ItemController@deleteItem'));
