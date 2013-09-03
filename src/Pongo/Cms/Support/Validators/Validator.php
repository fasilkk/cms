<?php namespace Pongo\Cms\Support\Validators;

use Input, Validator;

abstract class Validator {

	/**
	 * Incoming POST data
	 * 					
	 * @var mix
	 */
	protected $input;

	/**
	 * Validation errors
	 * 
	 * @var object
	 */
	public $errors;

	/**
	 * Validations rules
	 * 
	 * @var array
	 */
	public static $rules;

	public function __construct($input = null)
	{
		$this->input = $input ?: Input::all();
	}

	public function passes()
	{
		$validation = Validator::make($this->input, static::$rules);

		if ($validation->passes()) return true;

		$this->errors = $validation->messages();

		return false;
	}

}