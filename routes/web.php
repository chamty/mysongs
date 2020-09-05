<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/mypage/songs', 'SongsController@index')->name('songs.list');
Route::get('/mypage/song/new', 'SongsController@create')->name('songs.new');
Route::post('/mypage/song', 'SongsController@store')->name('songs.store');

Route::get('/mypage/song/edit/{id}', 'SongsController@edit')->name('songs.edit');
Route::post('/mypage/song/update/{id}', 'SongsController@update')->name('songs.update');

Route::get('/mypage/song/{id}', 'SongsController@show')->name('songs.detail');
Route::delete('/mypage/song/{id}', 'SongsController@destroy')->name('songs.destroy');

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
