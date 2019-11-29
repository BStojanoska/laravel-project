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

Route::view('/', 'welcome');

Route::get('/users/show', 'UserController@index')->name('users');
Route::get('/users/add', 'UserController@form')->name('addUserForm');
Route::get('/users/delete/{id}', 'UserController@delete')->name('deleteUser');
Route::get('/users/edit/{id}', 'UserController@edit')->name('editUser');

Route::post('/users/addUser', 'UserController@add')->name('addUser');