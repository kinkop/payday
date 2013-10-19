<?php

	class ContactController extends BaseController
	{
		
		protected $layout = 'layouts.default';
		
		function __construct()
		{
			parent::__construct();
			$this->initMainMenu('main_menus', 1);
			$this->initMainMenu('footer_menus', 2);
		}
		
		public function getIndex()
		{
			$view = array();
			
			$this->addJs('jquery-validate-script', 'js/jquery.validate.min.js');
			$this->addJs('contact_us_main_script', 'js/usage/contact_us/contact_us.js');
			$this->addJs('contact_us_page_script', 'js/usage/contact_us/contact_us_page.js');
			
			$this->setPageTitle('Contact Us');
			$this->setMetaDescriptions('Contact payday');
			$this->setMetaKeywords('contact, payday, loan');
			$this->setBodyClass('contact');
			$this->layout->content = View::make('contact.index', $view);
		}
		
		public function postIndex()
		{
			$input = Input::all();
			$content = "<p>Customer Name: {$input['contact_name']}</p>"
						. "<p>Customer Email: {$input['contact_email']}</p>"
						. "<p>Subject: {$input['contact_subject']}</p>"
						. "<p>Body: {$input['contact_message']}</p>";
			
			mail('looklikework@gmail.com', 'Payday Contact (' . $input['contact_subject'] . ')', $content);
			mail('pakinmankong@gmail.com', 'Payday Contact (' . $input['contact_subject'] . ')', $content);
			
			$this->setPageTitle('Contact Us');
			$this->layout->content = View::make('contact.sent');
		}
		
	}