<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ThreadController@policies')
	->name('policies');

Route::get('policy', 'ThreadController@policy')
	->name('policy');

Route::get('index', 'ThreadController@index')
	->name('index');

Route::get('show', 'ThreadController@show')
	->name('show');

Route::post('create', 'ThreadController@create')
	->name('create');

Route::put('update', 'ThreadController@update')
	->name('update');

Route::delete('delete', 'ThreadController@delete')
	->name('delete');

Route::post('restore', 'ThreadController@restore')
	->name('restore');

Route::delete('force-delete', 'ThreadController@forceDelete')
	->name('force.delete');

Route::post('export', 'ThreadController@export')
	->name('export');