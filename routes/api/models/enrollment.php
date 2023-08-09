<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'EnrollmentController@policies')
	->name('policies');

Route::get('policy', 'EnrollmentController@policy')
	->name('policy');

Route::get('index', 'EnrollmentController@index')
	->name('index');

Route::get('show', 'EnrollmentController@show')
	->name('show');

Route::post('create', 'EnrollmentController@create')
	->name('create');

Route::put('update', 'EnrollmentController@update')
	->name('update');

Route::delete('delete', 'EnrollmentController@delete')
	->name('delete');

Route::post('restore', 'EnrollmentController@restore')
	->name('restore');

Route::delete('force-delete', 'EnrollmentController@forceDelete')
	->name('force.delete');

Route::post('export', 'EnrollmentController@export')
	->name('export');