<?php

	namespace Controllers\Admin;	

	class LoginController extends \BaseController
	{
		
		protected $layout = 'layouts.admin_login';
		
		public function getIndex()
		{
			$view['login_form_action'] = \URL::to('admin/login');
			$view['invalid_login'] = false;
			if (\Session::has('errors')) {
				$view['invalid_login'] = \Session::get('errors')->all(':message<br />');
			}
			
			$this->layout->content = \View::make('admin.login.index', $view);
		}
		
		public function postIndex()
		{
			$input = \Input::all();
			
			if (!\Auth::attempt(array('username' => $input['username'], 'password' => $input['password'])))
			{
				return \Redirect::to('admin/login')->withInput()->withErrors('Invalid username or password');    
			}
			
			$this->setDefaultSite();
			
			return \Redirect::to('admin/dashboard');
			
		}
		
		protected function setDefaultSite()
		{
			$siteModel = new \Site();
			$siteModel->setCurrentSite(1);
		}
		
	}