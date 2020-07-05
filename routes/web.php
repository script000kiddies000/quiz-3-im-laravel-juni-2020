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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/artikel/create', 'ArtikelController@create')->middleware('auth'); // menampilkan halaman form
Route::post('/artikel', 'ArtikelController@store')->middleware('auth'); // menyimpan data
Route::get('/artikel', 'ArtikelController@index'); // menampilkan semua
Route::get('/artikel/{id}', 'ArtikelController@show'); // menampilkan detail item dengan id
Route::get('/artikel/{id}/edit', 'ArtikelController@edit')->middleware('auth'); // menampilkan form untuk edit item
Route::put('/artikel/{id}', 'ArtikelController@update')->middleware('auth'); // menyimpan perubahan dari form edit
Route::delete('/artikel/{id}', 'ArtikelController@destroy')->middleware('auth'); // menghapus data dengan id

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
