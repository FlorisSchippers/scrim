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
		if (count($team->users) >= 1) {
			$total = 0;
			$counter = 0;
			foreach ($team->users as $user) {
				$total += $user->rating;
				$counter++;
			}
			$team->rating = $total / $counter;
		}

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
		$this->validate($request, [
				'name' => 'required|max:255',
				'abbreviation' => 'required|max:6',
				'image' => 'required|url'
		]);

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

	public function deleteTeam($id)
	{
		$user = Auth::user();
		if ($user->admin == true) {
			$users = User::all();
			foreach ($users as $user) {
				if ($user->team_id = $id) {
					$user->team_id = NULL;
					$user->save();
				}
			}

			$team = Team::find($id);
			$team->delete();

			return redirect('admin');
		} else {
			Session::flash('error', 'You are not authorized');
			return redirect('');
		}
	}
}