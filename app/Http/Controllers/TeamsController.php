<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TeamsController extends Controller
{
	public function index()
	{
		$teams = Team::all();
		return view('teams.index', compact('teams'));
	}

	public function show($id)
	{
		$team = Team::find($id);
		$user = Auth::user();
		if ($user === null) {
			$user = new User;
			$user->team_id = 0;
		}
		return view('teams.show', compact('user', 'team'));
	}

	public function addTeam()
	{
		return view('teams.add');
	}

	public function saveTeam(Request $request)
	{
		$team = new Team;
		$team->name = $request->name;
		$team->abbreviation = $request->abbreviation;
		$team->image = $request->image;
		$team->save();
		$user = Auth::user();
		$user->team_id = $team->id;
		$user->save();

		return redirect('users/me');
	}

	public function joinTeam($id)
	{
		$user = Auth::user();
		if ($user === null) {
			return redirect('teams/' . $id);
		} else {
			$user->team_id = $id;
			$user->save();

			return redirect('teams/' . $id);
		}
	}
}