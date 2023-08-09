<?php

use Illuminate\Support\Facades\Route;

Route::get('policies', 'CertificateController@policies')
	->name('policies');

Route::get('policy', 'CertificateController@policy')
	->name('policy');

Route::get('index', 'CertificateController@index')
	->name('index');

Route::get('show', 'CertificateController@show')
	->name('show');

Route::post('create', 'CertificateController@create')
	->name('create');

Route::put('update', 'CertificateController@update')
	->name('update');

Route::delete('delete', 'CertificateController@delete')
	->name('delete');

Route::post('restore', 'CertificateController@restore')
	->name('restore');

Route::delete('force-delete', 'CertificateController@forceDelete')
	->name('force.delete');

Route::post('export', 'CertificateController@export')
	->name('export');