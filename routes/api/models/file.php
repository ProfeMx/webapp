<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'FileController@policies')
	->name('policies');

Route::get('policy', 'FileController@policy')
	->name('policy');

Route::get('index', 'FileController@index')
	->name('index');

Route::get('show', 'FileController@show')
	->name('show');

Route::post('create', 'FileController@create')
	->name('create');

Route::put('update', 'FileController@update')
	->name('update');

Route::delete('delete', 'FileController@delete')
	->name('delete');

Route::post('restore', 'FileController@restore')
	->name('restore');

Route::delete('force-delete', 'FileController@forceDelete')
	->name('force.delete');

Route::post('export', 'FileController@export')
	->name('export');