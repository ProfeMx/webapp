<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'NoteController@policies')
	->name('policies');

Route::get('policy', 'NoteController@policy')
	->name('policy');

Route::get('index', 'NoteController@index')
	->name('index');

Route::get('show', 'NoteController@show')
	->name('show');

Route::post('create', 'NoteController@create')
	->name('create');

Route::put('update', 'NoteController@update')
	->name('update');

Route::delete('delete', 'NoteController@delete')
	->name('delete');

Route::post('restore', 'NoteController@restore')
	->name('restore');

Route::delete('force-delete', 'NoteController@forceDelete')
	->name('force.delete');

Route::post('export', 'NoteController@export')
	->name('export');