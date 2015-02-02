<?php
/**
 *
 */
class Fennec_Object {

	public function __get( $property ) {
		$getter='get_'.$property;
		if ( method_exists( $this, $getter ) ) {
			return $this->$getter();
		}
		throw new Undefined_Property_Exception( __( sprintf( 'Property "%s.%s" is not defined', get_class( $this ), $property ), FENEC_TEXT_DOMAIN ) );
	}

	public function __set( $property, $value ) {
		$setter='set_'.$property;
		if ( method_exists( $this, $setter ) ) {
			return $this->$setter( $value );
		} elseif ( method_exists( $this, 'get_'.$property ) ) {
			throw new Read_Only_Exception( __( sprintf( 'Property "%s.%s" is read only', get_class( $this ), $property ), FENEC_TEXT_DOMAIN ) );
		}
		throw new Undefined_Property_Exception( __( sprintf( 'Property "%s.%s" is not defined', get_class( $this ), $property ), FENEC_TEXT_DOMAIN ) );
	}

	public function __isset( $property ) {
		$getter='get_'.$property;
		if ( method_exists( $this, $getter ) ) {
			return $this->$getter() !==null;
		}
		return false;
	}

	public function __unset( $property ) {
		$setter = 'set_' . $property;
		if ( method_exists( $this, $setter ) ) {
			$this->$setter( null );
		}elseif ( method_exists( $this, 'get_'.$property ) ) {
			throw new Read_Only_Exception( __( sprintf( 'Property "%s.%s" is read only', get_class( $this ), $property ), FENEC_TEXT_DOMAIN ) );
		}
	}

	public function __call( $method, $params ) {

	}

	public function has_property( $property ) {
		return method_exists( $this, 'get_'.$property ) || method_exists( $this, 'set_'.$property );
	}

	public function can_get_property( $property ) {
		return method_exists( $this, 'get_'.$property );
	}

	public function can_set_property( $property ) {
		return method_exists( $this, 'get_'.$property );
	}
}
