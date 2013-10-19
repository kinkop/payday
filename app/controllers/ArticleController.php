<?php

	class ArticleController extends BaseController
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
			
		}
		
		public function getDetail($seoIdUrl)
		{
			
		}
		
	}