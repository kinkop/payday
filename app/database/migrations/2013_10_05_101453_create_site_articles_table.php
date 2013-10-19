<?php

use Illuminate\Database\Migrations\Migration;

class CreateSiteArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\Schema::create('site_articles', function($table){
			
			$table->integer('site_id');
			$table->integer('article_id');
			$table->timestamps();
			$table->primary(array('site_id', 'article_id'));
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		\Schema::drop('site_articles');
	}

}