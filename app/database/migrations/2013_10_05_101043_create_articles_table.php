<?php

use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\Schema::create('articles', function($table){
			
			$table->increments('id');
			$table->string('seo_url')->unique();
			$table->string('title', 200);
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
		\Schema::drop('articles');
	}

}