<?php

namespace App\Http\Controllers;

use App\User;
use App\Scrim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class scrimsController extends Controller
{
	public function index()
	{
		$scrims = Scrim::all();
		return view('scrims.index', compact('scrims'));
	}

	public function show($id)
	{
		$scrim = Scrim::find($id);
		$user = Auth::user();
		if ($user === null) {
			$user = new User;
			$user->id = 0;
			$user->team_id = 0;
		}
		return view('scrims.show', compact('scrim', 'team', 'user'));
	}

	public function addScrim()
	{
		$user = Auth::user();
		return view('scrims.add', compact('user'));
	}

	public function saveScrim(Request $request)
	{
		$scrim = new Scrim;
		$scrim->team_id = $request->team_id;
		$scrim->date = $request->date;
		$scrim->startTime = $request->startTime;
		$scrim->endTime = $request->endTime;
		$scrim->save();

		return redirect('/teams/' . $request->team_id);
	}

	public function postComment()
	{

	}
}