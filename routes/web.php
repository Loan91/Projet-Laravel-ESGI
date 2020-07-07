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

Route::get('/admin/users/edit/{id}', 'AdminController@edit')
    ->middleware('auth')
    ->middleware('can:admin_users')
    ->name('admin_users_edit');

Route::post('admin/users/edit/{id}', 'AdminController@save')
    ->middleware('auth')
    ->middleware('can:admin_users')
    ->name('admin_users_save');

Route::get('/admin/users/delete/{id}', 'AdminController@delete')
    ->middleware('auth')
    ->middleware('can:admin_users')
    ->name('admin_users_delete');
