<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ThreadReplyController@policies')
	->name('policies');

Route::get('policy', 'ThreadReplyController@policy')
	->name('policy');

Route::get('index', 'ThreadReplyController@index')
	->name('index');

Route::get('show', 'ThreadReplyController@show')
	->name('show');

Route::post('create', 'ThreadReplyController@create')
	->name('create');

Route::put('update', 'ThreadReplyController@update')
	->name('update');

Route::delete('delete', 'ThreadReplyController@delete')
	->name('delete');

Route::post('restore', 'ThreadReplyController@restore')
	->name('restore');

Route::delete('force-delete', 'ThreadReplyController@forceDelete')
	->name('force.delete');

Route::post('export', 'ThreadReplyController@export')
	->name('export');