<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['scrim_id', 'user_id', 'body'];

	public function scrim()
	{
		return $this->belongsTo(Scrim::class);
	}
}