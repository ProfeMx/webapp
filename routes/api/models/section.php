<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'SectionController@policies')
	->name('policies');

Route::get('policy', 'SectionController@policy')
	->name('policy');

Route::get('index', 'SectionController@index')
	->name('index');

Route::get('show', 'SectionController@show')
	->name('show');

Route::post('create', 'SectionController@create')
	->name('create');

Route::put('update', 'SectionController@update')
	->name('update');

Route::delete('delete', 'SectionController@delete')
	->name('delete');

Route::post('restore', 'SectionController@restore')
	->name('restore');

Route::delete('force-delete', 'SectionController@forceDelete')
	->name('force.delete');

Route::post('export', 'SectionController@export')
	->name('export');