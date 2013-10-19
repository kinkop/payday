<?php

	namespace Controllers\Admin;
	
	class LogoutController extends \BaseController
	{
		
		public function getIndex()
		{
			\Auth::logout();
			return \Redirect::to('admin/login');
		}
		
	}