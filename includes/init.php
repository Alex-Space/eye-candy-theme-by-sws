<?php

class Sws_Eye_Candy_Theme {
	
	/**
	 * List of colors variations registered in this plugin.
	 *
	 * @since 1.0
	 * @access private
	 * @var array $colors List of colors registered in this plugin.
	 *                    Needed for registering colors-fresh dependency.
	 */

	private $colors = array(
		'eye_candy_light'
	);

	function __construct() {
		add_action( 'admin_init' , array( $this, 'add_color_schemes' ) );
	}

	/**
	 * Register color schemes.
	 */
	function add_color_schemes() {
		
		/**
		 * Add Eye Candy Light
		 */ 
		wp_admin_css_color(
			'eye_candy_light', __( 'Eye Candy Light', 'eye_candy' ),
			plugins_url( "colors/light/css/eye-candy-light.css", __DIR__ ),
			array( '#000', '#9C684F', '#BEBEBE', '#3C3C3C' ),
			array( 'base' => '#f1f2f3', 'focus' => '#fff', 'current' => '#fff' )
		);

	}

}

global $spl_colors;
$spl_colors = new Sws_Eye_Candy_Theme;

$current_color = get_user_option( 'admin_color', get_current_user_id() );
pr($current_color);