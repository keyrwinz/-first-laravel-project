<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use Illuminate\Http\Request;
use View, Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UsersController extends BaseController
{
    public function index()
    {
    	$users = User::all();

		return View::make('users.index', ['users' => $users]);
    }
 	
 	public function show($username)
    {
    	$user = User::whereUsername($username)->first();

		return View::make('users.show', ['user' => $user]);
    }

    public function create()
    {
    	return View::make('users.create');
    }

    public function store()
    {
    	$user = new User;
    	$user->username = Input::get('username');
    	$user->email = Input::get('email');
    	$user->password = Hash::make(Input::get('password'));
    	$user->save();

    	return Redirect::to('/users');
    }
}
