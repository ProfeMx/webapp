<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'HomeworkController@policies')
	->name('policies');

Route::get('policy', 'HomeworkController@policy')
	->name('policy');

Route::get('index', 'HomeworkController@index')
	->name('index');

Route::get('show', 'HomeworkController@show')
	->name('show');

Route::post('create', 'HomeworkController@create')
	->name('create');

Route::put('update', 'HomeworkController@update')
	->name('update');

Route::delete('delete', 'HomeworkController@delete')
	->name('delete');

Route::post('restore', 'HomeworkController@restore')
	->name('restore');

Route::delete('force-delete', 'HomeworkController@forceDelete')
	->name('force.delete');

Route::post('export', 'HomeworkController@export')
	->name('export');