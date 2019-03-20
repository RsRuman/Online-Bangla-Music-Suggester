<?php

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

Route::get('/', 'ScrapperController@getSongs');
//Route::get('/', 'ScrapperController@getLatestSongs');
Route::get('/search', 'ScrapperController@searchSongByName');
Route::get('/filter', 'ScrapperController@filterSearch');
Auth::routes();
Route::get('/profile', 'ProfileController@showProfile');
Route::get('/addlist', 'ProfileController@addSong');
Route::get('/delete/{id}', 'ProfileController@deleteSong');

Route::get('/home', 'HomeController@index')->name('home');
