<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	
	protected  $asset = array();
	protected $message;
	protected $currentSite;
	
	function __construct()
	{
		$this->message = new \Illuminate\Support\MessageBag();
		$this->detectMessages();
		$this->currentSite = \Config::get('app.Privacy Policy', 1);
	}
	
	protected function detectMessages()
	{
		$this->addMessagesToView('success', 'success_message');
		$this->addMessagesToView('errors', 'errors_message');
		
	}
	
	protected function addMessagesToView($sessionName, $viewName)
	{
		$message = null;
		
		if (Session::has($sessionName)) {
			$message = Session::get($sessionName);
			if (!$message instanceof \Illuminate\Support\MessageBag) {
				$messageObj = new \Illuminate\Support\MessageBag();
				$messageObj->add($sessionName, $message);
				var_dump($messageObj);
				$message = $messageObj;
			}
			
			$message = $message->all(':message<br />');
		}
		
		View::share($viewName, $message);
	}
	
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	protected function setPageTitle($title)
	{
		View::share('page_title', $title);
	}
	
	protected function addJs($key, $path)
	{
		$path = '<script src="' . asset($path) . '"></script>';
		$this->addAsset('js', $key, $path);
		$this->setAssetView('js');
	}
	
	protected function addCss($key, $path)
	{
		$path = '<link rel="stylesheet" href="' . asset($path) . '" />';
		$this->addAsset('css', $key, $path);
		$this->setAssetView('css');
	}
	
	protected function addAsset($type, $key, $path)
	{
		if (!isset($this->asset[$type])) {
			$this->asset[$type] = array();
		}
		
		$this->asset[$type][$key] = $path;
	}
	
	protected function setAssetView($type)
	{
		View::share('asset_' . $type, '');
		if (isset($this->asset[$type])) {
			if ($this->asset[$type]) {
				$content = "\r\n";
				foreach ($this->asset[$type] as $key => $path) {
					$content .= $path . "\r\n";
				}
				
				View::share('asset_' . $type, $content);
			}
		}
	}
	
	protected function initEditor()
	{
		$this->addCss('ckediotr-main-style', 'plugins/ckeditor/styles.js');
		$this->addJs('ckediotr-main-script', 'plugins/ckeditor/ckeditor.js');
		$this->addJs('ckediotr-jquery-script', 'plugins/ckeditor/adapters/jquery.js');
	}
	
	protected function initMainMenu($menuName, $menuType)
	{
		$siteMenuModel = new \SiteMenu();
		$menus = $siteMenuModel->getSiteMenu($this->currentSite, $menuType);
		$menus = $siteMenuModel->generateDatas($menus);
		View::share('global_' . $menuName, $menus);
	}
	
	protected function setMetaDescriptions($descriptions)
	{
		View::share('meta_descriptions', '<meta name="description" content="' . $descriptions . '">');
	}
	
	protected function setMetaKeywords($keywords)
	{
		View::share('meta_keywords', '<meta name="keywords" content="' . $keywords . '">');
	}

	protected function setBodyClass($className, $includePageNamed = true)
	{
		if ($includePageNamed) {
			$className = $className . '-page';
		}
		View::share('body_class', $className);
	}

}