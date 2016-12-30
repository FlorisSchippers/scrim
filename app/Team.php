<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $fillable = ['name'];

	public function players()
	{
		return $this->hasMany(User::class);
	}

	public function scrims()
	{
		return $this->hasMany(Scrim::class);
	}
}