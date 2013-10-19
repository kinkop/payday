<?php

	class ContentController extends BaseController
	{
		protected $layout = 'layouts.default';
		
		function __construct()
		{
			parent::__construct();
			
			$this->initMainMenu('main_menus', 1);
			$this->initMainMenu('footer_menus', 2);
		}
		
		public function getIndex($seoUrl)
		{
			$view = array();
			$contentModel = new \Content();
			
			$contents = $contentModel->getContent(null, $seoUrl);
			
			if (!$contents) {
				\App::abort(404, "Page '{$seoUrl}' not found.");
			}
			
			$view['title'] = $contents[0]->title;
			$view['content'] = $contents[0]->content;
			
			$this->setPageTitle($contents[0]->title);
			$this->setMetaDescriptions($contents[0]->meta_descriptions);
			$this->setMetaKeywords($contents[0]->meta_keywords);
			$this->setBodyClass($contents[0]->seo_url);

			$this->layout->content = View::make('content.index', $view);
		}
		
	}