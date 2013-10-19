<?php

use Illuminate\Database\Migrations\Migration;

class CreateSiteMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\Schema::create('site_menus', function($table){
			$table->integer('site_id');
			$table->integer('menu_id');
			$table->timestamps();
			$table->primary(array('site_id', 'menu_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		\Schema::drop('site_menus');
	}

}