<?php 

	class Email
	{
		public $status = [
			'code_status',
			'description_status'
		];

		public function __get($attr)
		{
			return $this -> $attr;
		}

		public function __set($attr, $value)
		{
			$this -> $attr = $value;
		}
	}
