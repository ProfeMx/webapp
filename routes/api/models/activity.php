<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ActivityController@policies')
	->name('policies');

Route::get('policy', 'ActivityController@policy')
	->name('policy');

Route::get('index', 'ActivityController@index')
	->name('index');

Route::get('show', 'ActivityController@show')
	->name('show');

Route::post('create', 'ActivityController@create')
	->name('create');

Route::put('update', 'ActivityController@update')
	->name('update');

Route::delete('delete', 'ActivityController@delete')
	->name('delete');

Route::post('restore', 'ActivityController@restore')
	->name('restore');

Route::delete('force-delete', 'ActivityController@forceDelete')
	->name('force.delete');

Route::post('export', 'ActivityController@export')
	->name('export');