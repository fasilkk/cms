<?php namespace Pongo\Cms\Support\Repositories;

use Pongo\Cms\Models\Role as Role;

class RoleRepositoryEloquent implements RoleRepositoryInterface {

	public function orderBy($field, $order)
	{
		return Role::orderBy($field, $order)->get();
	}

}
