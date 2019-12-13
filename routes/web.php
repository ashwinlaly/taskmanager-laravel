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

Route::get('/', 'authController@index');
Route::get('login', 'authController@index');
Route::post('login', 'authController@login');

Route::get('signup', 'authController@create');
Route::post('signup', 'authController@store');

Route::get('logout', 'authController@logout');

Route::middleware(['checkUserLogedIn'])->group(function() {

    // For Admin User
    Route::get('dashboard', 'authController@dashboard');
    Route::resource('tasks', 'taskController');
    Route::resource('roles', 'roleController');
    Route::resource('users', 'userController');
    Route::resource('profiles', 'profileController');
    Route::resource('projects', 'projectController');

    // For other user
    Route::get('mytask', 'taskController@getSubUserTasks');
    Route::post('assigntask', 'taskController@getTaskAssignedto');
});