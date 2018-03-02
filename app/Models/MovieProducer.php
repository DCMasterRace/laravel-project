<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MovieProducer extends Model
{
	protected $table = 'movie_producer';

	protected $fillable = [
		'movie_id', 'actor_id'
	];

	public function movieProducer()
	{
		return $this->belongsTo('App\Models\Producer', 'prod_id');
	}

}
