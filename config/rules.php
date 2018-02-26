<?php

return [
	'actor' => [
		'name' => 'required|min:5|max:50',
		'sex' => 'required|min:4|max:6',
		'bio' => 'required|min:10',
		'dob' => 'required'
	],

	'movie' => [
		'name' => 'required|min:5|max:50',
		'year_release' => 'required',
		'plot' => 'required|min:10',
		'poster' => 'required'
	],

	'producer' => [
		'name' => 'required|min:5|max:50',
		'sex' => 'required|min:4|max:6',
		'bio' => 'required|min:10',
		'dob' => 'required'
	]
];
