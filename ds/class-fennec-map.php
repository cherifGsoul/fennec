<?php
/**
 *
 */
class Fennec_Map extends Fennec_Object implements IteratorAggregate, ArrayAccess, Countable
{
	private $_data;
	private $_read_only=false;

	/**
	 * 
	 */
	public function __construct( $data, $read_only=false ) {

	}

	/**
	 * Gets the value of _read_only.
	 *
	 * @return mixed
	 */
	public function get_read_only() {
		return $this->_read_only;
	}

	/**
	 * Sets the value of _read_only.
	 *
	 * @param mixed   $_read_only the _read_only
	 *
	 * @return self
	 */
	public function set_read_only( $read_only ) {
		$this->_read_only = $_read_only;

	}

	public function getIterator(){

	}

	public function offsetExists($offset){

	}

	public function offsetGet($offset){

	}

	public function offsetSet($offset,$value) {
		
	}

	public function offsetUnset($offset){

	}

	public function count(){

	}
}
