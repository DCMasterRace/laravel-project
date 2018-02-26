<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	protected $table = 'movies';

	protected $fillable = [
		'name', 'year_release', 'plot', 'poster'
	];
}
