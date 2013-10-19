<?php

	class BaseModel extends Eloquent
	{
		protected $message;
		
		function __construct()
		{
			parent::__construct();
			
			$this->message = new \Illuminate\Support\MessageBag();
		}
		
		public function getMessage()
		{
			return $this->message;
		}
		
	}