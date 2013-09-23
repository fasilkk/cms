<?php namespace Pongo\Cms\Support\Validators;

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
		$this->input = $input ?: \Input::all();
	}

	/**
	 * Format errors array
	 * 
	 * @return array
	 */
	public function formatErrors()
	{
		$errors = $this->errors;

		foreach (static::$rules as $name => $rule) {

			if($errors->has($name)) {
				$error_msg[$name] = $errors->first($name);	
			}			

		}

		return array(
			'status' 	=> 'error',
			'msg'		=> t('alert.error.validator'),
			'errors'	=> $error_msg
		);
	}

	/**
	 * Get validation errors
	 * 
	 * @return object
	 */
	public function getErrors()
	{
		return $this->errors;
	}

	/**
	 * Check validation
	 * 
	 * @return bool validation result
	 */
	public function passes()
	{
		$validation = \Validator::make($this->input, static::$rules);

		if ($validation->passes()) return true;

		$this->errors = $validation->messages();

		return false;
	}

}