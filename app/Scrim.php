<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scrim extends Model
{
	protected $fillable = ['startTime, endTime, opponentId'];

	public function team()
	{
		return $this->belongsTo(Team::class);
	}
}