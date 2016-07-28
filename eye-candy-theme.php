<?php 
/*
* Plugin name: Eye-candy theme by SWS
* Description: The best Admin Theme for WordPress
* Author: Alex Space
* Author URI: spwanderer@mail.ru
* Version: 1.0
*/

function pr( $val ) {
	echo '<pre class="debugger">';
	print_r( $val );
	echo '</pre>';
}

define( 'SWS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SWS_PLUGIN_URL', __FILE__ );
define( 'SWS_PLUGIN_NAME', 'Eye-candy theme by SWS' );

require_once( SWS_PLUGIN_DIR .  'includes/init.php' );
require_once( SWS_PLUGIN_DIR .  'includes/options-page.php' );
require_once( SWS_PLUGIN_DIR .  'includes/add-logo-admin-menu.php' );