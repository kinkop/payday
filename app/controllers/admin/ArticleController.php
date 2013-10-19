<?php

	namespace Controllers\Admin;
	
	class ArticleController extends \BaseController
	{
		
		protected $layout = 'layouts.admin';
		
		public function getIndex()
		{
			$view = array();
		
			$this->layout->content = \View::make('admin.article.index', $view);
		}
		
	}