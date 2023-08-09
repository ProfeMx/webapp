<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'SubmissionController@policies')
	->name('policies');

Route::get('policy', 'SubmissionController@policy')
	->name('policy');

Route::get('index', 'SubmissionController@index')
	->name('index');

Route::get('show', 'SubmissionController@show')
	->name('show');

Route::post('create', 'SubmissionController@create')
	->name('create');

Route::put('update', 'SubmissionController@update')
	->name('update');

Route::delete('delete', 'SubmissionController@delete')
	->name('delete');

Route::post('restore', 'SubmissionController@restore')
	->name('restore');

Route::delete('force-delete', 'SubmissionController@forceDelete')
	->name('force.delete');

Route::post('export', 'SubmissionController@export')
	->name('export');