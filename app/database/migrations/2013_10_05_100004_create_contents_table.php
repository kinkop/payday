<?php

use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\Schema::create('contents', function($table){
			
			$table->increments('id');
			$table->string('seo_url')->unique();
			$table->string('title');
			$table->text('content');
			$table->text('meta_keywords');
			$table->text('meta_descriptions');
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
		\Schema::drop('contents');
	}

}