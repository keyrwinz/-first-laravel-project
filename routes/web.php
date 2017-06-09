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

Route::get('/', 'ControllerTest@home');
//Route::get('/kur', 'ControllerTest@kur');

Route::get('/kur', function()
{
	$users = DB::table('db-test')->get();
	return $users;
});
