<?php

use Illuminate\Support\Facades\Route;

Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@getIndex']);
Route::resource('article', 'ArticleController');
Route::resource('category', 'CategoryController');
Route::resource('page', 'PageController');
Route::resource('user', 'UserController');
Route::resource('china_university', 'ChinaUniversityController');
Route::resource('spell', 'SpellController');
Route::post('spell/{spellId}/generate', 'SpellController@generate');
