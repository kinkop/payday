<?php

	class SiteTableSeeder extends Seeder
	{
		
		public function run()
		{
			DB::table('sites')->delete();
		
			$site = new \Site();
			$site->name = 'fastmoneyexpert.com';
			$site->url = 'http://fastmoneyexpert.com';
			$site->save();
		}
		
	}