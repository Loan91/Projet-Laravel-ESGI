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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/admin/users', 'AdminController@index')
    ->middleware('auth')
    ->middleware('can:admin_users')
    ->name('admin_users');

Route::get('/films', 'FilmController@index')->name('film');

Route::get('/films/new', 'FilmController@create')->name('new_film');

Route::post('/films/add', 'FilmController@store')->name('add_film');
