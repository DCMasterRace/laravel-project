<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
	protected $table = 'actors';

	protected $fillable = [
		'name', 'sex', 'bio', 'dob'
	];

	public function cast()
	{
		return $this->hasMany('App\Models\MovieCast');
	}
}
