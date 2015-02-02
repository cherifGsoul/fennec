<?php
/**
* 
*/
class New_Object extends Fennec_Object
{
	private $_prop='Initial';
	private $_object=null;

	public function get_prop()
	{
		return $this->_prop;
	}

	public function set_prop($value) {
		$this->_prop=$value;
	}

	public function get_object() {
		if(!$this->_object) {
			$this->_object = new New_Object;
			$this->_object->_prop = 'Object property';
		}
		return $this->_object;
	}
}