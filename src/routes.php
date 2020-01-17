<?php

use Illuminate\Support\Facades\Route;

Route::get('/posts', 'BlogController@index');
Route::get('/posts/create', 'BlogController@create');
Route::post('/posts/create', 'BlogController@store');
Route::get('/posts/{post}/edit', 'BlogController@edit');
Route::post('/posts/{post}/edit', 'BlogController@update');
Route::delete('/posts/{post}/delete', 'BlogController@destroy');