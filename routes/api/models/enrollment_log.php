<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'EnrollmentLogController@policies')
	->name('policies');

Route::get('policy', 'EnrollmentLogController@policy')
	->name('policy');

Route::get('index', 'EnrollmentLogController@index')
	->name('index');

Route::get('show', 'EnrollmentLogController@show')
	->name('show');

Route::post('create', 'EnrollmentLogController@create')
	->name('create');

Route::put('update', 'EnrollmentLogController@update')
	->name('update');

Route::delete('delete', 'EnrollmentLogController@delete')
	->name('delete');

Route::post('restore', 'EnrollmentLogController@restore')
	->name('restore');

Route::delete('force-delete', 'EnrollmentLogController@forceDelete')
	->name('force.delete');

Route::post('export', 'EnrollmentLogController@export')
	->name('export');