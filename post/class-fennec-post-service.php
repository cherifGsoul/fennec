<?php
/**
* 
*/
class Fennec_Post_Service extends Fennec_Service
{
	private $_post_type;

	public function init()
	{
		parent::init();
	}

	public function create_type($name, $plural, $singular,$args) {
		$post_type=new Fennec_Post_Type($name,$plural,$singular,$args);
	}
}