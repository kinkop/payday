<?php

	namespace Controllers\Admin;
	
	class DashboardController extends \BaseController
	{
		protected $layout = 'layouts.admin';
		
		public function getIndex()
		{
			$view = array();
			$this->layout->content = \View::make('admin.dashboard.index', $view);
		}
		
	}