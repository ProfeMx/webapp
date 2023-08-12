<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'CourseController@policies')
	->name('policies');

Route::get('policy', 'CourseController@policy')
	->name('policy');

Route::get('index', 'CourseController@index')
	->name('index');

Route::get('show', 'CourseController@show')
	->name('show');

Route::post('create', 'CourseController@create')
	->name('create');

Route::put('update', 'CourseController@update')
	->name('update');

Route::delete('delete', 'CourseController@delete')
	->name('delete');

Route::post('restore', 'CourseController@restore')
	->name('restore');

Route::delete('force-delete', 'CourseController@forceDelete')
	->name('force.delete');

Route::post('export', 'CourseController@export')
	->name('export');

Route::post('assign-path', 'CourseController@assignPath')
	->name('assign.path');

Route::post('deallocate-path', 'CourseController@deallocatePath')
	->name('deallocate.path');