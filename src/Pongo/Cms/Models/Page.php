<?php namespace Pongo\Cms\Models;

use LaravelBook\Ardent\Ardent;

class Page extends Ardent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	// protected $hidden = array('password');

	/**
	 * Allowed mass assignment columns
	 * 
	 * @var array
	 */
	// protected $fillable = array('username', 'email');

	/**
	 * Danied mass assignment columns
	 * 
	 * @var array
	 */
	// protected $guarded = array('id', 'password');

	/* ARDENT */

	/**
	 * Ardent clear redundant attributes
	 * 
	 * @var boolean
	 */
	public $autoPurgeRedundantAttributes = true;

	/**
	 * Ardent validation rules
	 * 
	 * @var array
	 */
	public static $rules = array(

		/*'username' 				=> 'required|between:4,16',
		'email'					=> 'required|email',
		'password'				=> 'required|alpha_num|between:4,8|confirmed',
		'password_confirmation' => 'required|alpha_num|between:4,8'*/

	);

}