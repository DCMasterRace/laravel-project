<?php

return [

	'error' => [
		'db' => [
			'duplicate'          => 'Record already exists.',
			'inserted'           => 'Record inserted successfully.',
			'updated'            => 'Record updated successfully.',
			'no_update'          => 'No record updated.',
			'deleted'            => 'Record deleted successfully',
			'not_found'          => 'Record not found',
			'insert_err'         => 'Insert unsuccessful'
		],

        'validation' => [

            'unique'            => 'duplicate',
            'required'          => 'required',
            'min'               => 'minimum of :min characters',
            'max'               => 'maximum of :max characters',
            'alpha_num'         => 'only alphanumeric characters are allowed',
            'alpha'             => 'only Alphabetical characters are allowed',
            'between'           => 'between :min and :max characters',
            'numeric'           => 'must be numeric value',
            'digits'            => 'must be :digits digits',
            'digits_between'    => 'between :min and :max digits',
            'same'              => 'the :attribute and :other must match'

        ],

        'validation_customer' => [

            'required'          => 'required',
            'min'               => ':attribute minimum of :min characters',
            'max'               => ':attribute maximum of :max characters',
            'alpha_num'         => 'only alphanumeric characters are allowed',
            'alpha'             => 'only Alphabetical characters are allowed',
            'between'           => 'between :min and :max characters',
            'numeric'           => 'must be numeric value',
            'digits'            => 'must be :digits digits',
            'digits_between'    => 'between :min and :max digits',
            'same'              => 'the :attribute and :other must match'

        ],

    ],

	'response' => [
		'success'               => 200,
		'data_not_exist'        => 204,
		'invalid_credentials'   => 401,
		'forbidden_access'      => 403,
		'data_validation'       => 406,
		'file_not_found'        => 410,
		'not_found'             => 404,
		'internal_server_error' => 500,
		'server_timeout'        => 504,
	],

];
