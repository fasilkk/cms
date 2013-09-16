<?php namespace Pongo\Cms\Models;

use Eloquent;

class Page extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';

	/**
	 * Timestamp needed
	 * 
	 * @var boolean
	 */
	public $timestamps = true;

	/**
	 * Guarded mass-assignment property
	 * 
	 * @var array
	 */
	protected $guarded = array('id');

	/**
	 * Role relationship
	 * Each page has one role
	 * 
	 * @return mixed
	 */
	public function role()
	{
		return $this->belongsTo('Pongo\Cms\Models\Role');
	}

	/**
	 * Elements relationship
	 * Each element has many and belongs to many pages
	 * 
	 * @return mixed
	 */
	public function elements()
	{
		return $this->belongsToMany('Pongo\Cms\Models\Element')
					->withPivot('order_id')
					->orderBy('order_id', 'asc');
	}

}