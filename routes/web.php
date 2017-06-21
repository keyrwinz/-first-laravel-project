<?php

use App\Models\User;
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

Route::get('/', 'ControllerTest@home');
Route::get('/kur', 'ControllerTest@kur');
//Route::get('/kur', 'ControllerTest@dbase');
//Route::get('users.index', 'ControllerTest@users');
Route::get('users', function()
{
	$users = User::all();

	return View::make('users.index', ['users' => $users]);
});

Route::get('users/{username}', function($username)
{
	$user = User::whereUsername($username)->first();

	return View::make('users.show', ['user' => $user]);
});
