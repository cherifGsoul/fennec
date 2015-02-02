<?php
/**
 *
 */



class Fennec_Base {

	private static $_core;
	private static $_packages=array( 'fennec'=>FENNEC_PATH );

	private static $_core_classes=array(
		'Read_Only_Exception'=>'base/class-read-only-exception.php',
		'Undefined_Property_Exception'=>'base/class-undefined-property-exception.php',
		'Fennec_Core'=>'base/class-fennec-core.php',
		'Fennec_Object'=>'base/class-fennec-object.php',
		'Fennec_Plugin'=>'base/class-fennec-plugin.php',
		'Fennec_Service'=>'base/class-fennec-service.php',
		'Fennec_Service_Container'=>'di/class-fennec-service-container.php',
		'Fennec_Map'=>'ds/class-fennec-map.php',
		'Fennec_List'=>'ds/class-fennec-list.php',
		'Fennec_Post_Service'=>'post/class-fennec-post-service.php',
		);


	public static function version() {
		return '0.1-dev';
	}

	public static function create_plugin( $config=array() ) {
		return apply_filters( 'plugin_config', $config );
	}


	public function load( $package ) {

	}

	public static function register_package_path( $name, $path ) {
		if ( empty( $path ) ) {
			unset( self::$_packages[$name] );
		} else {
			self::$_packages[$name]=rtrim( $path, '\\/' );
		}
	}

	public static function load_package_path( $package ) {

	}




	public static function autoload( $class_name ) {
		if ( isset( self::$_core_classes[$class_name] ) ) {
			include plugin_dir_path( __FILE__ ) . self::$_core_classes[$class_name];
		}else {
			return false;
		}
	}
}
