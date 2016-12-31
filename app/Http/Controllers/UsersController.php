<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
	public function index()
	{
		$users = User::all();
		return view('users.index', compact('users'));
	}

	public function me()
	{
		$user = Auth::user();
		return view('users.me', compact('user'));
	}

	public function show($id)
	{
		$user = User::find($id);
		return view('users.show', compact('user'));
	}
}