<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'PathController@policies')
	->name('policies');

Route::get('policy', 'PathController@policy')
	->name('policy');

Route::get('index', 'PathController@index')
	->name('index');

Route::get('show', 'PathController@show')
	->name('show');

Route::post('create', 'PathController@create')
	->name('create');

Route::put('update', 'PathController@update')
	->name('update');

Route::delete('delete', 'PathController@delete')
	->name('delete');

Route::post('restore', 'PathController@restore')
	->name('restore');

Route::delete('force-delete', 'PathController@forceDelete')
	->name('force.delete');

Route::post('export', 'PathController@export')
	->name('export');

Route::post('assign-career', 'PathController@assignCareer')
	->name('assign.career');

Route::post('deallocate-career', 'PathController@deallocateCareer')
	->name('deallocate.career');

Route::post('assign-course', 'PathController@assignCourse')
	->name('assign.course');

Route::post('deallocate-course', 'PathController@deallocateCourse')
	->name('deallocate.course');
