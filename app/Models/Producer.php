<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
	protected $table = 'producers';

	protected $fillable = [
		'name', 'sex', 'bio', 'dob'
	];
}

