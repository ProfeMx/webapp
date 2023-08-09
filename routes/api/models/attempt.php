<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'AttemptController@policies')
	->name('policies');

Route::get('policy', 'AttemptController@policy')
	->name('policy');

Route::get('index', 'AttemptController@index')
	->name('index');

Route::get('show', 'AttemptController@show')
	->name('show');

Route::post('create', 'AttemptController@create')
	->name('create');

Route::put('update', 'AttemptController@update')
	->name('update');

Route::delete('delete', 'AttemptController@delete')
	->name('delete');

Route::post('restore', 'AttemptController@restore')
	->name('restore');

Route::delete('force-delete', 'AttemptController@forceDelete')
	->name('force.delete');

Route::post('export', 'AttemptController@export')
	->name('export');