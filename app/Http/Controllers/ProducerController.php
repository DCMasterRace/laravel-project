<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producer;

use Validator;
use Response;
use Config;

class ProducerController extends Controller
{
	public function __construct()
	{
		$this->rules = Config::get('rules.producer');
		$this->http_codes = Config::get('constant.response');
		$this->db_msg = Config::get('constant.errors.db');
	}

	public function index()
	{
		$data = Producer::all();

		return view('producer.producer')->withData($data);
	}

	public function show($id)
	{
		return Producer::find($id);
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

		$producer = Producer::create($request->all());
		return response()->json($producer, 201);
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

		// check message
		if(count($message) > 0)
		{
			return Response::json($message, $this->http_codes['success']);
		}

		$producer = Producer::findOrFail($id);
		$producer->update($request->all());

		return response()->json($producer, 200);
	}

	public function delete(Request $request, $id)
	{
		$producer = Producer::findOrFail($id);
		$producer->delete();
		
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

		$data = Producer::orWhere([
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
