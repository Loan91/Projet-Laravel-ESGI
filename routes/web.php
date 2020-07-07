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



Route::get('/films', 'FilmController@index')
    ->middleware('auth')
    ->middleware('can:admin_films')
    ->name('film');

Route::get('/films/new', 'FilmController@create')
    ->middleware('auth')
    ->middleware('can:admin_films')
    ->name('new_film');

Route::post('/films/add', 'FilmController@store')
    ->middleware('auth')
    ->middleware('can:admin_films')
    ->name('add_film');

Route::get('/films/show/{id}', 'FilmController@show')
    ->middleware('auth')
    ->middleware('can:admin_films')
    ->name('show_film');

Route::get('/films/edit/{id}', 'FilmController@edit')
    ->middleware('auth')
    ->middleware('can:admin_films')
    ->name('edit_film');

Route::post('/films/update/{id}', 'FilmController@update')
    ->middleware('auth')
    ->middleware('can:admin_films')
    ->name('update_film');

Route::get('/films/delete/{id}', 'FilmController@destroy')
    ->middleware('auth')
    ->middleware('can:admin_films')
    ->name('delete_film');


Route::get('/films/forceDelete/{id}', 'FilmController@forceDestroy')
    ->middleware('auth')
    ->middleware('can:admin_films')
    ->name('force_delete_film');


Route::get('/films/restore/{id}', 'FilmController@restore')
    ->middleware('auth')
    ->middleware('can:admin_films')
    ->name('restore_film');





Route::get('/admin/users', 'AdminController@index')
    ->middleware('auth')
    ->middleware('can:admin_users')
    ->name('admin_users');

Route::get('/admin/users/edit/{id}', 'AdminController@edit')
    ->middleware('auth')
    ->middleware('can:admin_users')
    ->name('admin_users_edit');

Route::post('/admin/users/edit/{id}', 'AdminController@save')
    ->middleware('auth')
    ->middleware('can:admin_users')
    ->name('admin_users_save');

Route::get('/admin/users/delete/{id}', 'AdminController@delete')
    ->middleware('auth')
    ->middleware('can:admin_users')
    ->name('admin_users_delete');



Route::get('/videotheque', 'VideothequeController@index')
    ->middleware('auth')
    ->name('videotheque');

Route::get('/videotheque/new', 'VideothequeController@new')
    ->middleware('auth')
    ->name('videotheque_new');

Route::post('/videotheque/new', 'VideothequeController@save')
    ->middleware('auth')
    ->name('videotheque_save');

Route::get('/videotheque/delete/{id}', 'VideothequeController@delete')
    ->middleware('auth')
    ->name('videotheque_delete');
