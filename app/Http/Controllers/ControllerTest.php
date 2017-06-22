<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class ControllerTest extends BaseController
{
	public function home()
	{
		return view('welcome');
	}

	public function kur()
	{
		return view('kur');
	}

	public function dbase()
	{
		$users = User::all();
		return $users;
	}
}
