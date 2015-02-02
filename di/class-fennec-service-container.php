<?php
/**
 *
 */
abstract class Fennec_Service_Container extends Fennec_Service {
	private $_services=array();

	public function __get( $name ) {
		if ( $this->has( $name ) )
			return $this->get( $name );
		return parent::__get( $name );
	}

	public function __isset( $name ) {
		if ( $this->has( $name ) )
			return $this->get( $name )!=null;
		return parent::__isset( $name );
	}

	public function get( $name ) {
		if ( $this->has( $name ) ) {
			return $this->_services[$name];
		}
		return false;
	}

	public function set( $name, $config=array() ) {
		if ( !$this->has( 'name' )) {
				$service = $this->_services[$name]=new $classname;
				$this->configure_service( $service, $config );
			}
		}

		public function has( $service_id ) {
			return isset( $this->_services[$service_id] );
		}

	}


	
