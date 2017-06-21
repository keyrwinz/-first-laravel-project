<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use View;
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
}
