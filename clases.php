<?php
	class Template {
		public $var;

		public function test() {
			$this->var++;
			return $this->var;
		}
	}

	$template = new Template();
	$template->var = 1;
	echo $template->test();
?>