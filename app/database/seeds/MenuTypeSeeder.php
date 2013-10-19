<?php

	
	class MenuTypeSeeder extends Seeder
	{
		public function run()
		{
			DB::table('menu_types')->delete();
		
			$menuType = new MenuType();
			$menuType->name = "Main menu";
			$menuType->save();
			
			$menuType = new MenuType();
			$menuType->name = "Footer menu";
			$menuType->save();
		}
	}
