<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MovieCast extends Model
{
	protected $table = 'movie_cast';

	protected $fillable = [
		'movie_id', 'actor_id'
	];

	public function actorCast()
	{
		return $this->belongsTo('App\Models\Actor', 'actor_id');
	}

}
