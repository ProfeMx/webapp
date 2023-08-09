<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'ForumSubscriptionController@policies')
	->name('policies');

Route::get('policy', 'ForumSubscriptionController@policy')
	->name('policy');

Route::get('index', 'ForumSubscriptionController@index')
	->name('index');

Route::get('show', 'ForumSubscriptionController@show')
	->name('show');

Route::post('create', 'ForumSubscriptionController@create')
	->name('create');

Route::put('update', 'ForumSubscriptionController@update')
	->name('update');

Route::delete('delete', 'ForumSubscriptionController@delete')
	->name('delete');

Route::post('restore', 'ForumSubscriptionController@restore')
	->name('restore');

Route::delete('force-delete', 'ForumSubscriptionController@forceDelete')
	->name('force.delete');

Route::post('export', 'ForumSubscriptionController@export')
	->name('export');