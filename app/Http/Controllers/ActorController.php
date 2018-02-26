<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

use Validator;
use Response;
use Config;

class ActorController extends Controller
{
	public function __construct()
	{
		$this->rules = Config::get('rules.actor');
		$this->http_codes = Config::get('constant.response');
		$this->db_msg = Config::get('constant.errors.db');
	}
	public function index()
	{
		$data = Actor::all();

		return view('actor.actor')->withData($data);
	}

	public function show($id)
	{
		return Actor::find($id);
	}

	public function store(Request $request)
	{
		$input = $request->only(
			'name',
			'sex',
			'bio',
			'dob'
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

		$actor = Actor::create($request->all());
		return Response()->json($actor, 201);
	}

	public function update(Request $request, $id)
	{
		$input = $request->only(
			'name',
			'sex',
			'bio',
			'dob'
		);
		$rules = $this->rules;

		$validator = Validator::make(
						$input,
						$rules
					);

		$message = $validator->errors();

		if(count($message) > 0)
		{
			return Response::json($message, $this->http_codes['success']);
		}

		$actor = Actor::findOrFail($id);
		$actor->update($request->all());

		return Response()->json($actor, 200);
	}

	public function delete(Request $request, $id)
	{
		$actor = Actor::findOrFail($id);
		$actor->delete();

		return Response::json( [ 'success' => $this->db_msg[ 'deleted' ] ] , $this->http_codes[ 'success' ] );
	}

	public function search(Request $request)
	{
		$data = $this->searchData($request);

		return Response::json($data, $this->http_codes['success']);
	}

	private function searchData(Request $request)
	{
		$input = $request->only(
			'name',
			'sex',
			'bio',
			'dob'
		);

		$data = Actor::orWhere([
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
