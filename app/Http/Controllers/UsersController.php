<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use View, Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UsersController extends BaseController
{
	protected $user;
	
	public function __construct(User $user)
	{
		$this->user = $user;
	}

    public function index()
    {
    	$users = $this->user->all();

		return View::make('users.index', ['users' => $users]);
    }
 	
 	public function show($username)
    {
    	$user = $this->user->whereUsername($username)->first();

		return View::make('users.show', ['user' => $user]);
    }

    public function create()
    {
    	return View::make('users.create');
    }

    public function store()
    {
    	/*
    	$validation = Validator::make(Input::all(), User::$rules);

    	if ($validation->fails())
    	{
    		return Redirect::back()->withInput()->withErrors($validation->messages());
    	}*/
    	if ( ! $this->user->isValid(Input::all()))
    	{
    		return Redirect::back()->withInput()->withErrors($this->user->errors);
    	}

    	$this->user->create(Input::all());

    	return Redirect::to('/users');
    }
}
