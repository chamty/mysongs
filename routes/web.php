<?php

use Illuminate\Support\Facades\Route;

Route::get('/songs', 'HomeController@index')->name('songs.list');
Route::get('/songs/new', 'SongsController@create')->name('songs.new');
Route::post('/song', 'SongsController@store')->name('songs.store');

Route::get('/song/edit/{id}', 'SongsController@edit')->name('songs.edit');
Route::post('/song/update/{id}', 'SongsController@update')->name('songs.update');

Route::get('/song/{id}', 'SongsController@show')->name('songs.detail');
Route::delete('/song/{id}', 'SongsController@destroy')->name('songs.destroy');

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/user/index', 'UserController@index')->name('user.index');
Route::get('/user/edit', 'UserController@edit')->name('user.edit');
Route::post('/user/update', 'UserController@update')->name('user.update');

