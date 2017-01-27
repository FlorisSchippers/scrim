<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

	public function admin()
	{
		$user = Auth::user();
		if ($user->admin == true) {
			$users = User::all();
			$teams = Team::all();
			return view('admin.index', compact('user', 'users', 'teams'));
		} else {
			Session::flash('error', 'You are not authorized');
			return redirect('');
		}
	}

	public function show($id)
	{
		$user = User::find($id);
		return view('users.show', compact('user'));
	}

	public function leaveTeam()
	{
		$user = Auth::user();
		$user->team_id = null;
		$user->save();
		return view('users.me', compact('user'));
	}

	public function toggleAdmin($id)
	{
		$user = Auth::user();
		if ($user->admin == true) {
			$targetUser = User::find($id);
			if ($targetUser->admin == true) {
				$targetUser->admin = false;
				$targetUser->save();
			} else {
				$targetUser->admin = true;
				$targetUser->save();
			}
			$users = User::all();
			return view('admin.index', compact('user', 'users'));
		} else {
			Session::flash('error', 'You are not authorized');
			return redirect('');
		}
	}

	public function toggleActive($id)
	{
		$user = Auth::user();
		if ($user->admin == true) {
			$targetUser = User::find($id);
			if ($targetUser->active == true) {
				$targetUser->active = false;
				$targetUser->save();
			} else {
				$targetUser->active = true;
				$targetUser->save();
			}
			$users = User::all();
			return view('admin.index', compact('user', 'users'));
		} else {
			Session::flash('error', 'You are not authorized');
			return redirect('');
		}
	}
}