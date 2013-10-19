<?php

	class Site extends BaseModel
	{
		
		public function setCurrentSite($site)
		{
			Session::put('PAYDAY_CURRENT_SITE', $site);
		}
		
		public function getCurrentSite()
		{
			return Session::get('PAYDAY_CURRENT_SITE', 1);
		}
		
		public function getSite()
		{
			$sites = DB::table('sites')
					->orderBy('created_at', 'ASC');
			
			return $sites->get();
		}
		
	}