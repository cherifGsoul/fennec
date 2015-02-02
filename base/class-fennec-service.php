<?php
/**
 *
 */
abstract class Fennec_Service extends Fennec_Object
{
	public function on($hook,$callback,$priority = 10, $accepted_args = 1) {
		return add_action($hook,$callback,$priority,$accepted_args);
	}

	public function off($tag, $function_to_remove, $priority = 10) {
		return remove_action( $tag, $function_to_remove, $priority );
	}

	public function trigger($tag, $arg = ''){
		return do_action($tag, $arg );
	}
}