<?php

	class Content extends BaseModel
	{
		public function saveContent($data)
		{
			if (empty($data['id'])) {
				return $this->insertContent($data); 
			} else {
				return $this->updateContent($data['id'], $data);
			}
			
			$this->message->add('cloud_not_save_content', 'Cloud not save content');
			return false;
		}
		
		public function insertContent($data)
		{
			$content = new static();
			$content->title = $data['title'];
			$content->content = $data['content'];
			$content->seo_url = $data['seo_url'];
			$content->meta_keywords = $data['meta_keywords'];
			$content->meta_descriptions = $data['meta_descriptions'];
			
			if (!$content->save($data)) {
				$this->message->add('cloud_not_insert_content', 'Cloud not insert content');
				return false;
			}
			
			return $content->id;
		}
		
		public function updateContent($contentId, $data)
		{
			$content = static::find($contentId);
			
			if (!$content) {
				$this->message->add('cloud_not_update_content', 'Cloud not update content');
				return false;
			}
			
			$content->title = $data['title'];
			$content->content = $data['content'];
			$content->seo_url = $data['seo_url'];
			$content->meta_keywords = $data['meta_keywords'];
			$content->meta_descriptions = $data['meta_descriptions'];
			
			$content->save();
			
			return $contentId;
		}
		
		public function getContent($contentId = null, $seoUrl = null)
		{
			$contents = DB::table('contents');
			
			if (!empty($contentId)) {
				$contents->where('id', '=', $contentId);
			}
			
			if (!empty($seoUrl)) {
				$contents->where('seo_url', '=', $seoUrl);
			}
			
			return $contents->get();
		}
		
	}