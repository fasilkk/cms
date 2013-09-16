<?php namespace Pongo\Cms\Models;

use Eloquent;

class Element extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'elements';

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
	 * User relationship
	 * Each element has one author
	 * 
	 * @return mixed
	 */
	public function author()
	{
		return $this->belongsTo('Pongo\Cms\Models\User', 'author_id');
	}

	/**
	 * Pages relationship
	 * Each element has many and belongs to many pages
	 * 
	 * @return mixed
	 */
	public function pages()
	{
		return $this->belongsToMany('Pongo\Cms\Models\Page')
					->withPivot('order_id');
	}

}