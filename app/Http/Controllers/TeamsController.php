<?php

namespace App\Http\Controllers;

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
		return view('teams.show', compact('user'), compact('team'));
	}

	public function addTeam()
	{
		return view('teams.add');
	}

	public function saveTeam(Request $request)
	{
		$team = new Team;
		$team->name = $request->name;
		$team->save();
		$user = Auth::user();
		$user->team_id = $team->id;
		$user->save();

		return redirect('/users/me');
	}
}