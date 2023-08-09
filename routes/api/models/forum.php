<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ForumController@policies')
	->name('policies');

Route::get('policy', 'ForumController@policy')
	->name('policy');

Route::get('index', 'ForumController@index')
	->name('index');

Route::get('show', 'ForumController@show')
	->name('show');

Route::post('create', 'ForumController@create')
	->name('create');

Route::put('update', 'ForumController@update')
	->name('update');

Route::delete('delete', 'ForumController@delete')
	->name('delete');

Route::post('restore', 'ForumController@restore')
	->name('restore');

Route::delete('force-delete', 'ForumController@forceDelete')
	->name('force.delete');

Route::post('export', 'ForumController@export')
	->name('export');