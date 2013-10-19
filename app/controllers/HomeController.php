<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	protected $layout = 'layouts.default';
	
	function __construct()
	{
		parent::__construct();
		
		$this->initMainMenu('main_menus', 1);
		$this->initMainMenu('footer_menus', 2);
	}

	public function getIndex()
	{
		$this->setMetaDescriptions('Fast money expert, Payday Loan');
		$this->setMetaKeywords('home, contact, payday, loan');
		$this->setBodyClass('home');

		$this->layout->content = View::make('home.index');
	}

}