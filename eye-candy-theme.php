<?php
/*
* Plugin name: Eye-candy theme by SWS
* Description: It is admin color theme. It provides very soft color scheme and few options to customize WordPress admin. It developed specially for users who spend a lot of time in admin. This theme prevents eyes irritation with calm & softy colors.
* Author: Alex Space
* Author URI: spwanderer@mail.ru
* Version: 1.0
*/

if ( ! function_exists( 'pr' ) ) {
    function pr($val) {
        echo '<pre class="debug-tool">';
        print_r( $val );
        echo "</pre>";
    }
}

define( 'SWS_EYE_CANDY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( SWS_EYE_CANDY_PLUGIN_DIR .  'includes/init.php' );
require_once( SWS_EYE_CANDY_PLUGIN_DIR .  'includes/options-page.php' );
require_once( SWS_EYE_CANDY_PLUGIN_DIR .  'includes/options-page-style.php' );
