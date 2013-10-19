<?php

use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\Schema::create('menus', function($table){
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->integer('menu_type_id');
			$table->string('target_type', 100);
			$table->string('target_value', 100);
			$table->integer('sorting');
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
		\Schema::drop('menus');
	}

}