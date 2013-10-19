<?php

	namespace Controllers\Admin;
	
	class MenuController extends \BaseController
	{
		
		protected $layout = 'layouts.admin';
		protected $menuId;
		
		public function getIndex()
		{
			$view = array();
			
			$siteMenuModel = new \SiteMenu();
			$siteModel = new \Site();
			$view['menus'] = $siteMenuModel->getSiteMenu($siteModel->getCurrentSite());
			$this->setPageTitle('Menus');
			$this->layout->content = \View::make('admin.menu.index', $view);
		}
		
		public function getAdd()
		{
			$this->setPageTitle('Contents');
			$this->form('Add', 'add');
		}
		
		public function getEdit($menuId)
		{
			$this->menuId = (int) $menuId;
			$this->setPageTitle('Contents');
			$this->form('Edit', 'edit/' . $this->menuId);
		}
		
		protected function form($title, $form_action)
		{
			$view = array();
			
			$view['action_title'] = $title;
			$view['form_action'] = \URL::to('admin/menu/' . $form_action);
			$view['menu_types'] = \MenuType::all();
			$view['target_types'] = \Menu::$TARGET_TYPES;
			
			$siteContentModel  = new \SiteContent();
			$siteModel = new \Site();
			$view['target_types']['content']['extendDatas'] = $siteContentModel->getContents($siteModel->getCurrentSite());
			
			$menuModel = new \Menu();
			$view['name'] = '';
			$view['description'] = '';
			$view['menu_type_id'] = '';
			$view['target_type'] = '';
			$view['target_value'] = '';
			$view['sorting'] = $menuModel->getLatestSort() + 1;
			
			if (!empty($this->menuId)) {
				$menu = \Menu::find($this->menuId);
				
				if (!$menu) {
					exit('Menu not found.');
				}
				
				$view['name'] = $menu->name;
				$view['description'] = $menu->description;
				$view['menu_type_id'] = $menu->menu_type_id;
				$view['target_type'] = $menu->target_type;
				$view['target_value'] = $menu->target_value;
				$view['sorting'] = $menu->sorting;
			}
			
			$this->initEditor();
			$this->addJs('content-main-script', 'js/usage/menu/menu.js');
			$this->addJs('content-form-script', 'js/usage/menu/menu_form.js');
			$this->layout->content = \View::make('admin.menu.form', $view);
		}
		
		public function postAdd()
		{
			if (!$this->save()) {
				return \Redirect::back()->withInput()->withErrors($this->message);
			}
				
			return \Redirect::to('admin/menu')->with('success', 'Add menu successfully');
		}
		
		public function postEdit($menuId)
		{
			$this->menuId = (int) $menuId;
		
			if (!$this->save()) {
				return \Redirect::back()->withInput()->withErrors($this->message);
			}
		
			return \Redirect::to('admin/menu')->with('success', 'Edit menu successfully');
		}
		
		protected function save()
		{
			$input = \Input::all();
			
			$data['id'] = $this->menuId;
			$data['name'] = $input['name'];
			$data['description'] = $input['description'];
			$data['menu_type_id'] = $input['menu_type_id'];
			$data['target_type'] = $input['target_type'];
			$data['target_value'] = $this->getTargetValue($input);
			$data['sorting'] = $input['sorting'];
			
			$menuModel = new \Menu();
			$this->menuId = $menuModel->saveMenu($data);
			if ($this->menuId === false) {
				$this->message = $menuModel->getMessage();
				return false;
			}
			
			$this->addMenuToSite();
			return true;
		}
		
		protected function getTargetValue($data)
		{
			if ($data['target_type'] == 'controller') {
				return $data['target_value_controller'];
			} else if ($data['target_type'] == 'content') {
				return $data['target_value_content'];
			}
			
			return '';
		}
		
		protected function addMenuToSite()
		{
			$siteModel = new \Site();
			$siteMenuModel = new \SiteMenu();
			
			$siteMenuModel->addMenuToSite($siteModel->getCurrentSite(), $this->menuId);
		}
		
		public function getDelete($menuId)
		{
			$this->menuId = (int) $menuId;
				
				
			$menu = \DB::table('menus')
			->where('id', '=', $this->menuId);
				
			if (!$menu->count()) {
				exit('Menu not found.');
			}
				
			$siteModel = new \Site();
			$siteMenu = \DB::table('site_menus')
			->where('site_id', '=', $siteModel->getCurrentSite())
			->where('menu_id', '=', $this->menuId);
			$siteMenu->delete();
				
			$menu->delete();
				
				
				
			return \Redirect::to('admin/menu')->with('success', 'Delete menu successfully');
		}
		
	}