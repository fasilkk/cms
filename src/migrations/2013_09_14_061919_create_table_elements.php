<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableElements extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('elements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('lang', 5);
			$table->string('name', 50);
			$table->string('label', 50);
			$table->text('text');
			$table->integer('zone');
			$table->integer('author_id');
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
		Schema::drop('elements');
	}

}
