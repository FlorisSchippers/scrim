<?php

namespace App\Http\Controllers;

use App\Scrim;
use App\Team;
use Illuminate\Http\Request;

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
		return view('scrims.show', compact('scrim'), compact('team'));
	}
}