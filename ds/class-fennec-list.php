<?php
/**
 *
 */
class Fennec_List extends Fennec_Object implements ArrayAccess, IteratorAggregate, Countable
{
	private $_items;
	private $_count=0;

	public function __construct( $items=null ) {
		if ( !empty( $items ) ) {
			$this->build($items);
		}
	}


	public function build( $items ) {
		if ( is_array( $items ) ) {
			if ( $items instanceof Fennec_List ) {
				$items=$items->_items;
			}

			foreach ( $items as $item ) {
				$this->add( $item );
			}

		} elseif ( $items !=null ) {
			throw new Exception( __( "Data must be array", FENNEC_TEXTDOMAIN ) );
		}
	}

	public function add($item) {
		$this->insert_item_at($this->_count,$item);
		return $this->_count-1;
	}

	public function insert_item_at($index,$item) {

	}

	public function get_count() {
		return count( $this->_items );
	}

	public function offsetExists( $offset ) {

	}

	public function offsetGet( $offset ) {

	}

	public function offsetSet( $offset, $value ) {

	}

	public function offsetUnset( $offset ) {

	}

	public function getIterator() {

	}

	public function count() {

	}

}
