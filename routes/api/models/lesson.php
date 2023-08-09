<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'LessonController@policies')
	->name('policies');

Route::get('policy', 'LessonController@policy')
	->name('policy');

Route::get('index', 'LessonController@index')
	->name('index');

Route::get('show', 'LessonController@show')
	->name('show');

Route::post('create', 'LessonController@create')
	->name('create');

Route::put('update', 'LessonController@update')
	->name('update');

Route::delete('delete', 'LessonController@delete')
	->name('delete');

Route::post('restore', 'LessonController@restore')
	->name('restore');

Route::delete('force-delete', 'LessonController@forceDelete')
	->name('force.delete');

Route::post('export', 'LessonController@export')
	->name('export');