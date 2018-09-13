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
Auth::routes();

// Albums 

Route::get('/','AlbumsController@index')->name('albums');
Route::get('/albums','AlbumsController@index')->name('albums');

Route::get('/albums/create','AlbumsController@create')->name('albums.create');
Route::post('/albums/store','AlbumsController@store')->name('albums.store');


Route::get('/albums/edit/{id}','AlbumsController@edit')->name('albums.edit');
Route::post('/albums/update/{id}','AlbumsController@update')->name('albums.update');

Route::get('/albums/{id}','AlbumsController@show')->name('albums.show');

Route::get('/albums/delete/{id}','AlbumsController@destroy')->name('albums.destroy');


// Photos

Route::get('/photos/create/{id}','PhotosController@create')->name('photo.create');
Route::post('/photos/store','PhotosController@store')->name('photo.store');

Route::get('/photos/edit/{id}','PhotosController@edit')->name('photos.edit');
Route::post('/photos/update/{id}','PhotosController@update')->name('photos.update');

Route::get('/photos/{id}','PhotosController@show')->name('photos.show');


Route::get('/photos/delete/{id}','PhotosController@destroy')->name('photos.destroy');



Route::get('/home', 'HomeController@index')->name('home');
