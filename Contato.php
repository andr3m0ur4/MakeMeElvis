<?php 

	class Contato
	{
		public function __get($attr)
		{
			return $this -> $attr;
		}

		public function __set($attr, $value)
		{
			$this -> $attr = $value;
		}
	}
