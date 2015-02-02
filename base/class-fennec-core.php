<?php

class Fennec_Core extends Fennec_Plugin
{
	protected $_plugins=array();

	public function __construct()
	{
	}

	public function run() {
		$this->trigger('fennec_run');
	}

	public function activate(){
	}

	public function deactivate(){
		if(array_count_values($this->plugins)==0)
			return;
		
		foreach ($this->plugins as $name => $plugin) {
			$plugin->deactivate();
		}
	}

	public function get_plugins(){
		return $this->_plugins;
	}

	public function add_plugin(Fennec_Plugin $plugin){
		$this->_plugins[$plugin->name]=$plugin;
	}




}