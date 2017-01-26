<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use App\Scrim;
use App\Comment;
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
		foreach ($scrim->comments as $comment) {
			$comment->user = User::find($comment->user_id);
		}
		if ($user === null) {
			$user = new User;
			$user->id = 0;
			$user->team_id = 0;
		}
		if ($scrim->opponent_id) {
			$opponent = Team::find($scrim->opponent_id);
		} else {
			$opponent = new Team;
			$opponent->id = 0;
			$opponent->name = '';
		}
		return view('scrims.show', compact('scrim', 'user', 'opponent'));
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

		return redirect('/scrims/' . $scrim->id);
	}

	public function postComment(Request $request)
	{
		$comment = new Comment;
		$comment->scrim_id = $request->scrim_id;
		$comment->user_id = $request->user_id;
		$comment->body = $request->body;
		$comment->save();
		return redirect('/scrims/' . $request->scrim_id);
	}

	public function choose($scrim_id, $comment_id)
	{
		$comments = Comment::all();
		foreach ($comments as $comment) {
			$comment->chosen = false;
			$comment->save();
		}
		$comment = Comment::find($comment_id);
		$comment->chosen = true;
		$comment->save();
		$scrim = Scrim::find($scrim_id);
		$scrim->opponent_id = User::find($comment->user_id)->team_id;
		$scrim->save();
		return redirect('/scrims/' . $scrim_id);
	}

	public function removeScrim($id)
	{
		$scrim = Scrim::find($id);
		$team_id = $scrim->team_id;
		$scrim->delete();
		return redirect('/teams/' . $team_id);
	}
}