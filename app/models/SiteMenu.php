<?php

	class SiteMenu extends BaseModel
	{
		
		public function addMenuToSite($siteId, $menuId)
		{
			$siteMenu = DB::table('site_menus')
						->where('site_id', '=', $siteId)
						->where('menu_id', '=', $menuId)
						->count();
			
			if (!$siteMenu) {
				$siteMenu = new static();
				$siteMenu->site_id = $siteId;
				$siteMenu->menu_id = $menuId;
				$siteMenu->save();
			}
			
			return true;
		}
		
		public function getSiteMenu($siteId = null, $menuTypeId = null)
		{
			$siteMenus = DB::table('site_menus')
			->select('menus.id as id',
					'menus.name as name',
					'menus.description as description',
					'menus.menu_type_id as menu_type_id',
					'menus.target_type as target_type',
					'menus.target_value as target_value',
					'menus.sorting as sorting',
					'menu_types.name as menu_name',
					'menus.created_at as created_at',
					'menus.updated_at as updated_at')
					->join('menus', 'menus.id', '=', 'site_menus.menu_id')
					->join('menu_types', 'menu_types.id', '=', 'menus.menu_type_id');
		
			if (!empty($siteId)) {
				$siteMenus->where('site_menus.site_id', '=', $siteId);
			}
			
			if (!empty($menuTypeId)) {
				$siteMenus->where('menus.menu_type_id', '=', $menuTypeId);
			}
		
			$siteMenus->orderBy('sorting', 'ASC');
		
			return $siteMenus->get();
		}
		
		public function generateDatas($datas)
		{
			if ($datas) {
				foreach ($datas as $data) {
					$data->url = $this->getMenuUrl($data->target_type, $data->target_value);
				}
			}
			
			return $datas;
		}
		
		public function getMenuUrl($targetType, $targetValue)
		{
			switch ($targetType) {
				case 'controller':
					return URL::to($targetValue);
				break;
				case 'content':
					$content = Content::find($targetValue);
					
					if (!$content) {
						return '';
					}
					
					return URL::to($content->seo_url);
				break;
			}
			
			return '';
		}
		
	}