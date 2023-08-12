<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'CareerController@policies')
	->name('policies');

Route::get('policy', 'CareerController@policy')
	->name('policy');

Route::get('index', 'CareerController@index')
	->name('index');

Route::get('show', 'CareerController@show')
	->name('show');

Route::post('create', 'CareerController@create')
	->name('create');

Route::put('update', 'CareerController@update')
	->name('update');

Route::delete('delete', 'CareerController@delete')
	->name('delete');

Route::post('restore', 'CareerController@restore')
	->name('restore');

Route::delete('force-delete', 'CareerController@forceDelete')
	->name('force.delete');

Route::post('export', 'CareerController@export')
	->name('export');

Route::post('assign-path', 'CareerController@assignPath')
	->name('assign.path');

Route::post('deallocate-path', 'CareerController@deallocatePath')
	->name('deallocate.path');