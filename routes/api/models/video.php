<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'VideoController@policies')
	->name('policies');

Route::get('policy', 'VideoController@policy')
	->name('policy');

Route::get('index', 'VideoController@index')
	->name('index');

Route::get('show', 'VideoController@show')
	->name('show');

Route::post('create', 'VideoController@create')
	->name('create');

Route::put('update', 'VideoController@update')
	->name('update');

Route::delete('delete', 'VideoController@delete')
	->name('delete');

Route::post('restore', 'VideoController@restore')
	->name('restore');

Route::delete('force-delete', 'VideoController@forceDelete')
	->name('force.delete');

Route::post('export', 'VideoController@export')
	->name('export');