<?php namespace Pongo\Cms\Support\Repositories;

use Pongo\Cms\Models\Page as Page;

class PageRepositoryEloquent implements PageRepositoryInterface {

	public function all()
	{
		return Page::all();
	}

	public function find($id)
	{
		return Page::find($id);
	}

	public function create($input)
	{
		return Page::create($input);
	}

	public function update($id)
	{
		return Page::find($id);
	}

	public function delete($id)
	{
		return Page::find($id);
	}

}