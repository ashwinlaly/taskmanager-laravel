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

// Login
Route::get('/', function(){
    return view('welcome');
});
Route::get('/login', 'authController@index');
Route::post('/login', 'authController@login');

// Register
Route::get('/signup', 'authController@create');
Route::post('/signup', 'authController@store');

// Logout
Route::get('/logout', 'authController@logout');

// Tasks
Route::resource('/tasks', 'taskController');

// Projects
Route::resource('/project', 'projectController');

// Roles
Route::resource('/role', 'roleController');

// Users
Route::resource('/user', 'userController');

// Profile
Route::get('/profile', 'userController@index');
Route::post('/profile', 'userController@index');