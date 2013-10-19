<?php

	class UserTableSeeder extends Seeder 
	{
		
		public function run()
		{
			DB::table('users')->delete();
		
			$user = new \User();
			$user->username = 'supseradmin';
			$user->password = Hash::make('god371985#');
			$user->email = 'pakinmankong@gmail.com';
			$user->first_name = 'Super';
			$user->last_name = 'Admin';
			$user->save();
		}
		
	}