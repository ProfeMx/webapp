<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'QuizController@policies')
	->name('policies');

Route::get('policy', 'QuizController@policy')
	->name('policy');

Route::get('index', 'QuizController@index')
	->name('index');

Route::get('show', 'QuizController@show')
	->name('show');

Route::post('create', 'QuizController@create')
	->name('create');

Route::put('update', 'QuizController@update')
	->name('update');

Route::delete('delete', 'QuizController@delete')
	->name('delete');

Route::post('restore', 'QuizController@restore')
	->name('restore');

Route::delete('force-delete', 'QuizController@forceDelete')
	->name('force.delete');

Route::post('export', 'QuizController@export')
	->name('export');