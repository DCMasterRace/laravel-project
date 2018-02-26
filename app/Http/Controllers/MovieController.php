<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

use Validator;
use Response;
use Config;

class MovieController extends Controller
{
	public function __construct()
	{
		$this->rules = Config::get('rules.movie');
		$this->http_codes = Config::get('constant.response');
		$this->db_msg = Config::get('constant.errors.db');
	}

	public function index()
	{
		$data = Movie::all();
		/* return response()->json(Movie::all()); */
		return view('movie.movie')->withData($data);
	}

	public function show($id)
	{
		return response()->json(Movie::find($id));
	}

	public function store(Request $request)
	{
		$input = $request->only(
			'name',
			'year_release',
			'plot',
			'poster'
		);
		$rules = $this->rules;

		$validator = Validator::make(
						$input,
						$rules
					);

		$message = $validator->errors();

		// check message
		if(count($message) > 0)
		{
			return Response::json($message, $this->http_codes['success']);
		}

		$movie = Movie::create($request->all());
		return response()->json($movie, 201);
	}

	public function update(Request $request, $id)
	{
		$input = $request->only(
			'name',
			'year_release',
			'plot',
			'poster'
		);
		$rules = $this->rules;

		$validator = Validator::make(
						$input,
						$rules
					);

		$message = $validator->errors();

		// check message
		if(count($message) > 0)
		{
			return Response::json($message, $this->http_codes['success']);
		}

		$movie = Movie::findOrFail($id);
		$movie->update($request->all());

		return response()->json($movie, 200);
	}

	public function delete(Request $request, $id)
	{
		$movie = Movie::findOrFail($id);
		$movie->delete();
		
		return Response::json( [ 'success' => $this->db_msg[ 'deleted' ] ] , $this->http_codes[ 'success' ] );
	}

	private function searchData(Request $request)
	{
		$input = $request->only(
			'name',
			'year_release',
			'plot',
			'poster'
		);

		$data = Movie::orWhere([
				['name', 'like', '%'.$input["name"].'%'],
			])
			/* ->orWhere([ */
			/* 	['sex', $input['sex']] */
			/* ]) */
			/* ->orWhere([ */
			/* 	['bio', 'like', '%{$input["bio"]}%'] */
			/* ]) */
			->get();
			/* ->orWhere('dob', $input); */

		/* $data = Actor::where(function ($query) { */
		/* 		$query->where('name', 'like', '%'.$input['name'].'%') */
		/* 			->orWhere('sex', $input['sex']) */
		/* 			->orWhere('bio', 'like', '%'.$input['bio'].'%'); */
		/* 		}) */
		/* 	->get(); */
		return $data;
	}
}
