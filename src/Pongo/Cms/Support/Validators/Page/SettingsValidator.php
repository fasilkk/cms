<?php namespace Pongo\Cms\Support\Validators\Page;

use Pongo\Cms\Support\Validators\Validator;

class SettingsValidator extends Validator {

	/**
	 * Validation rules
	 * 
	 * @var array static
	 */
	public static $rules = array(
		'name' 			=> 'required',
		'slug_last'  	=> 'required|alpha_dash',
	);
	
}