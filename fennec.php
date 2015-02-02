<?php
/*
Plugin Name: Fennec
Description: Effcient PHP framework for WordPress Applications 
Plugin URI: http://cherifbouchelaghem.com
Author: Cherif BOUCHELAGHEM
Author URI: http://cherifbouchelaghem.com
Version: 1.0
License: GPL2
*/

/*

    Copyright (C) 2014  Cherif BOUCHELAGHEM  cherif.bouchelaghem@gmail.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
require_once plugin_dir_path(__FILE__) . 'class-fennec-base.php';
require_once plugin_dir_path(__FILE__) . 'class-fennec.php';

defined('FENNEC_TEXT_DOMAIN') or define( 'FENEC_TEXT_DOMAIN', 'fennec' );
defined('FENNEC_PATH') or  define( 'FENNEC_PATH', plugin_dir_path(__FILE__ ));

function fennec_init() {
    $fennec=new Fennec_Core;
    $fennec->run();
}

add_action( 'init', 'fennec_init');
spl_autoload_register(array('Fennec','autoload'),true);
