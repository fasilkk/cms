<?php namespace Pongo\Cms\Models;

use Eloquent;

class Role extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';

	/**
	 * No timestamp needed
	 * 
	 * @var boolean
	 */
	public $timestamps = false;

	/**
	 * Users relationship
	 * Each role has many users
	 * 
	 * @return mixed
	 */
	public function users()
	{
		return $this->hasMany('Pongo\Cms\Models\User');
	}



}