<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	protected $table = 'movies';

	protected $fillable = [
		'name', 'year_release', 'plot', 'poster'
	];

	public function actors()
	{
		return $this->hasMany('App\Models\MovieCast', 'movie_id', 'id');
	}

	public function producer()
	{
		return $this->hasOne('App\Models\MovieProducer', 'movie_id', 'id');
	}
}
