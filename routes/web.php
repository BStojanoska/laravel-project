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

// Users
Route::get('/users/show', 'UserController@index')->name('users');
Route::get('/users/add', 'UserController@form')->name('addUserForm');
Route::get('/users/delete/{id}', 'UserController@delete')->name('deleteUser');
Route::get('/users/edit/{id}', 'UserController@edit')->name('editUser');

Route::post('/users/addUser', 'UserController@add')->name('addUser');

// Groups
Route::get('/groups/show', 'GroupController@index')->name('groups');
Route::get('/groups/add', 'GroupController@form')->name('addGroupForm');
Route::get('/groups/edit/{id}', 'GroupController@edit')->name('editGroup');
Route::get('/groups/delete/{id}', 'GroupController@delete')->name('deleteGroup');

Route::post('/groups/addGroup', 'GroupController@add')->name('addGroup');
