<?php
/**
* 
*/
class Fennec_Post extends Object
{
	
	public function __construct($id)
	{
	}

	public function __get($property) {
		$value = get_post_meta( $this->_id, $property, true );
		if(isset($value)) {
			return $value;
		}else {
			parent::__get();
		}
	}
}