<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ResourceController@policies')
	->name('policies');

Route::get('policy', 'ResourceController@policy')
	->name('policy');

Route::get('index', 'ResourceController@index')
	->name('index');

Route::get('show', 'ResourceController@show')
	->name('show');

Route::post('create', 'ResourceController@create')
	->name('create');

Route::put('update', 'ResourceController@update')
	->name('update');

Route::delete('delete', 'ResourceController@delete')
	->name('delete');

Route::post('restore', 'ResourceController@restore')
	->name('restore');

Route::delete('force-delete', 'ResourceController@forceDelete')
	->name('force.delete');

Route::post('export', 'ResourceController@export')
	->name('export');