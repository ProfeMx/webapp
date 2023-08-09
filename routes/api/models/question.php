<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'QuestionController@policies')
	->name('policies');

Route::get('policy', 'QuestionController@policy')
	->name('policy');

Route::get('index', 'QuestionController@index')
	->name('index');

Route::get('show', 'QuestionController@show')
	->name('show');

Route::post('create', 'QuestionController@create')
	->name('create');

Route::put('update', 'QuestionController@update')
	->name('update');

Route::delete('delete', 'QuestionController@delete')
	->name('delete');

Route::post('restore', 'QuestionController@restore')
	->name('restore');

Route::delete('force-delete', 'QuestionController@forceDelete')
	->name('force.delete');

Route::post('export', 'QuestionController@export')
	->name('export');