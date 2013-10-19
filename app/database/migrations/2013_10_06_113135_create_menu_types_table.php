<?php

use Illuminate\Database\Migrations\Migration;

class CreateMenuTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\Schema::create('menu_types', function($table){
			$table->increments('id');
			$table->string('name', 150);
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
		\Schema::drop('menu_types');
	}

}