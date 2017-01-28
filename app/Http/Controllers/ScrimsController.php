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
		$scrimdates = [];
		foreach ($scrims as $scrim) {
			if (!in_array($scrim->date, $scrimdates)) {
				$scrimdates[] = $scrim->date;
			}
		}

		return view('scrims.index', compact('scrims', 'scrimdates'));
	}

	public function filter($date)
	{
		$allScrims = Scrim::all();
		$scrimdates = [];
		foreach ($allScrims as $scrim) {
			if (!in_array($scrim->date, $scrimdates)) {
				$scrimdates[] = $scrim->date;
			}
		}
		$scrims = [];
		foreach ($allScrims as $scrim) {
			if ($scrim->date == $date) {
				$scrims[] = $scrim;
			}
		}

		return view('scrims.index', compact('scrims', 'scrimdates', 'date'));
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
		$this->validate($request, [
				'date' => 'required|date|after:today',
				'startTime' => 'required',
				'endTime' => 'required|after:startTime'
		]);

		$scrim = new Scrim;
		$scrim->team_id = $request->team_id;
		$scrim->date = $request->date;
		$scrim->startTime = $request->startTime;
		$scrim->endTime = $request->endTime;
		$scrim->save();

		return redirect('/teams/' . $scrim->team_id);
	}

	public function postComment(Request $request)
	{
		$this->validate($request, [
				'body' => 'required|max:255'
		]);

		$comment = new Comment;
		$comment->scrim_id = $request->scrim_id;
		$comment->user_id = $request->user_id;
		$comment->body = $request->body;
		$comment->save();

		return redirect('/scrims/' . $request->scrim_id);
	}

	public function choose($scrim_id, $comment_id)
	{
		$scrim = Scrim::find($scrim_id);
		$newChosenComment = Comment::find($comment_id);
		$oldChosenComment = new Comment;
		$comments = Comment::all();

		foreach ($comments as $comment) {
			if ($comment->chosen == true) {
				$oldChosenComment = $comment;
			}
			$comment->chosen = false;
			$comment->save();
		}

		if ($newChosenComment->id == $oldChosenComment->id) {
			$newChosenComment->chosen = false;
			$scrim->opponent_id = NULL;
		} else {
			$newChosenComment->chosen = true;
			$scrim->opponent_id = User::find($newChosenComment->user_id)->team_id;
		}

		$newChosenComment->save();
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