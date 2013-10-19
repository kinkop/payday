<?php

	class SiteContent extends BaseModel
	{
		
		public function addContentToSite($siteId, $contentId)
		{
			$siteContent = DB::table('site_contents')
							->where('site_id', '=', $siteId)
							->where('content_id', '=', $contentId)
							->count();
			
			if (!$siteContent) {
				$siteContent = new static();
				$siteContent->site_id = $siteId;
				$siteContent->content_id = $contentId;
				$siteContent->save();
			}
			
			return true;
		}
		
		
		public function getContents($siteId = null)
		{
			$contents = DB::table('site_contents');
				
			if (!empty($contents)) {
				$contents->where('site_id', '=', $siteId);
			}
			
			$contents->join('contents', 'contents.id', '=', 'site_contents.content_id');
			$contents->orderBy('site_contents.created_at', 'ASC');
			return $contents->get();
		}
		
		
		
	}