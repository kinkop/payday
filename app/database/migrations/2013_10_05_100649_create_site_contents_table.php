<?php

use Illuminate\Database\Migrations\Migration;

class CreateSiteContentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\Schema::create('site_contents', function($table){
			
			$table->integer('site_id');
			$table->integer('content_id');
			$table->timestamps();
			$table->primary(array('site_id', 'content_id'));
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		\Schema::drop('site_contents');
	}

}