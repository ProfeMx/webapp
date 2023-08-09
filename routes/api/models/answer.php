<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'AnswerController@policies')
	->name('policies');

Route::get('policy', 'AnswerController@policy')
	->name('policy');

Route::get('index', 'AnswerController@index')
	->name('index');

Route::get('show', 'AnswerController@show')
	->name('show');

Route::post('create', 'AnswerController@create')
	->name('create');

Route::put('update', 'AnswerController@update')
	->name('update');

Route::delete('delete', 'AnswerController@delete')
	->name('delete');

Route::post('restore', 'AnswerController@restore')
	->name('restore');

Route::delete('force-delete', 'AnswerController@forceDelete')
	->name('force.delete');

Route::post('export', 'AnswerController@export')
	->name('export');