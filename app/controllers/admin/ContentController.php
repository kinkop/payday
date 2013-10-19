<?php

	namespace Controllers\Admin;
	
	class ContentController extends \BaseController
	{
		protected $layout = 'layouts.admin';
		protected $contentId;
		
		public function getIndex()
		{
			$view = array();
			
			$siteModel = new \Site();
			$siteContentModel = new \SiteContent();
			$contents = $siteContentModel->getContents($siteModel->getCurrentSite());
			$view['contents'] = $contents;
			
			$this->setPageTitle('Contents');
			$this->layout->content = \View::make('admin.content.index', $view);
		}
		
		public function getAdd()
		{
			$this->setPageTitle('Contents');
			$this->form('Add', 'add');
		}
		
		public function getEdit($contentId)
		{
			$this->contentId = (int) $contentId;
			$this->setPageTitle('Contents');
			$this->form('Edit', 'edit/' . $this->contentId);
		}
		
		protected function form($title, $form_action)
		{
			$view = array();
			
			$view['id'] = '';
			$view['title'] = '';
			$view['content'] = '';
			$view['seo_url'] = '';
			$view['meta_keywords'] = '';
			$view['meta_descriptions'] = '';
			if (!empty($this->contentId)) {
				$content = \Content::find($this->contentId);
				
				if (!$content) {
					exit('Content not found.');
				}
				
				$view['id'] = $content->id;
				$view['title'] = $content->title;
				$view['content'] = $content->content;
				$view['seo_url'] = $content->seo_url;
				$view['meta_keywords'] = $content->meta_keywords;
				$view['meta_descriptions'] = $content->meta_descriptions;
			}
			
			$view['action_title'] = $title;
			$view['form_action'] = \URL::to('admin/content/'.$form_action);
			
			$this->initEditor();
			$this->addJs('content-main-script', 'js/usage/content/content.js');
			$this->addJs('content-form-script', 'js/usage/content/content_form.js');
			$this->layout->content = \View::make('admin.content.form', $view);
		}
		
		public function postAdd()
		{
			if (!$this->save()) {
				return \Redirect::back()->withInput()->withErrors($this->message);
			}
			
			return \Redirect::to('admin/content')->with('success', 'Add content successfully');
		}
		
		public function postEdit($contentId)
		{
				$this->contentId = (int) $contentId;
				
				if (!$this->save()) {
					return \Redirect::back()->withInput()->withErrors($this->message);
				}
				
				return \Redirect::to('admin/content')->with('success', 'Edit content successfully');
		}
		
		protected function save()
		{
			$input = \Input::all();
			
			$contentModel = new \Content();
			$data['id'] = $this->contentId;
			$data['title'] = $input['title'];
			$data['content'] = $input['content'];
			$data['seo_url'] = $input['seo_url'];
			$data['meta_keywords'] = $input['meta_keywords'];
			$data['meta_descriptions'] = $input['meta_descriptions'];
			
			$contentId = $contentModel->saveContent($data);
			if ($contentId === false) {
				$this->message = $contentModel->getMessage();
				return false;
			}
			
			$this->contentId = $contentId;
			
			$this->addContentToSite();
			
			return true;
		}
		
		protected function addContentToSite()
		{
			$siteModel = new \Site();
			$siteContentModel = new \SiteContent();
			$siteContentModel->addContentToSite($siteModel->getCurrentSite(), $this->contentId);
		}
		
		
		public function getDelete($contentId)
		{
			$this->contentId = (int) $contentId;
			
			
			$content = \DB::table('contents')
						->where('id', '=', $this->contentId);
			
			if (!$content->count()) {
				exit('Content not found.');
			}
			
			$siteModel = new \Site();
			$siteContent = \DB::table('site_contents')
							->where('site_id', '=', $siteModel->getCurrentSite())
							->where('content_id', '=', $contentId);
			$siteContent->delete();
			
			$content->delete();
			
			
			
			return \Redirect::to('admin/content')->with('success', 'Delete content successfully');
		}
		
	}