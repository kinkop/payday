<?php

	class Menu extends BaseModel
	{
		
		public static $TARGET_TYPES = array(
			'controller' => array(
				'name' => 'Controller',
				'extend' => true,
				'extendType' => 'array',
				'extendDatas' => array(
					'home' => 'HomeController',
					'article' => 'ArticleController',
					'contact' => 'ContactController'
				)
			),
			'content' => array(
				'name' => 'Contents',
				'extend' => true,
				'extendType' => 'ajax',
				'extendDatas' => array()
			)
		);
		
		public function getLatestSort()
		{
			$menu = DB::table('menus')
					->orderBy('sorting', "DESC")
					->first();
			
			if ($menu) {
				return $menu->sorting;
			}
			
			return 0;
		}
		
		public function saveMenu($data)
		{
			if (empty($data['id'])) {
				return $this->insertMenu($data);
			} else {
				return $this->updateMenu($data['id'], $data);
			}
			
			$this->message->add('cloud_not_save_menu', 'Could not save menu');
			return false;
		}
		
		public function insertMenu($data)
		{
			$menu = new static();
			$menu->name = $data['name'];
			$menu->description = $data['description'];
			$menu->menu_type_id = $data['menu_type_id'];
			$menu->target_type = $data['target_type'];
			$menu->target_value = $data['target_value'];
			$menu->sorting = $data['sorting'];
			
			if (!$menu->save()) {
				$this->message->add('cloud_not_insert_menu', 'Could not insert menu');
				return false;
			}
			
			return $menu->id;
		}
		
		public function updateMenu($menuId, $data)
		{
			$menu = static::find($menuId);
			
			if (!$menu) {
				$this->message->add('menu_not_found', 'Menu not found');
				return false;
			}
			
			$menu->name = $data['name'];
			$menu->description = $data['description'];
			$menu->menu_type_id = $data['menu_type_id'];
			$menu->target_type = $data['target_type'];
			$menu->target_value = $data['target_value'];
			$menu->sorting = $data['sorting'];
			$menu->save();
				
			return $menu->id;
		}
		
	}