<?php namespace Pongo\Cms\Support\Validators;

class UserValidator extends Validator {

	/**
	 * Validation rules
	 * 
	 * @var array static
	 */
	public static $rules = array(
		'username' 	=> 'required',
		'email'  	=> 'required|email',
		'password' 	=> 'required|min:8|confirmed',
		'password_confirmation' => 'required|min:8',
	);
	
}