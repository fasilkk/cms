<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePages extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_id')
				  ->defaults(0);
			$table->string('lang', 5);
			$table->string('name', 255);
			$table->string('slug', 255);
			$table->string('title', 255);
			$table->text('keyw');
			$table->text('descr');
			$table->string('template', 100);
			$table->string('header', 100);
			$table->string('layout', 100);
			$table->string('footer', 100);
			$table->integer('access_level');
			$table->integer('author_id');
			$table->integer('role_id');
			$table->integer('role_level');
			$table->integer('order_id')
				  ->defaults(Config::get('cms::system.default_order'));
			$table->boolean('is_home');
			$table->boolean('is_valid');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pages');
	}

}
