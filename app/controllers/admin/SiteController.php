<?php

	namespace Controllers\Admin;
	
	class SiteController extends \BaseController
	{
		protected $layout = 'layouts.admin';
		
		public function getIndex()
		{
			$view = array();
			
			$siteModel = new \Site();
			$view['sites'] = $siteModel->getSite();
			
			$this->setPageTitle('Sites');
			$this->layout->content = \View::make('admin.site.index', $view);
		}
		
	}