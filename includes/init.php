<?php

class Sws_Eye_Candy_Theme {

	/**
	 * List of colors variations registered in this plugin.
	 *
	 * @since 1.0
	 * @access private
	 * @var array $colors List of colors registered in this plugin.
	 * Needed for registering colors-fresh dependency.
	 */

	private $colors = array(
		'eye_candy_light'
	);

	function __construct() {
		// Add schemes to admin
		add_action( 'admin_init' , array( $this, 'add_color_schemes' ) );
		// Add assets for schemes
		add_action( 'admin_enqueue_scripts' , array( $this, 'add_theme_assets' ) );
		// Add styled admin bar to frontend
		add_action( 'wp_enqueue_scripts' , array( $this, 'sws_adminbar_frontend' ) );

		// Add plugin link in plugins list to options page
		add_filter( 'plugin_action_links_' . SWS_EYE_CANDY_PLUGIN_LINK, array( $this, 'add_settings_link_plugin' ) );
	}

	/**
	 * Add styled admin bar to frontend
	 */
	function sws_adminbar_frontend() {

		$selected_color_scheme = get_user_meta( get_current_user_id(), 'admin_color', true );

		if ( $selected_color_scheme === 'eye_candy_light' ) {

			wp_enqueue_style( 'sws_adminbar_scheme', plugins_url( "colors/light/css/eye-candy-light.css", __DIR__ ) );

		}

	}

	/**
	 * Register color schemes.
	 */
	function add_color_schemes() {

		// Add Eye Candy Light
		if ( 'eye_candy_light' ) {

			wp_admin_css_color(
				'eye_candy_light', __( 'Eye Candy Light', 'eye_candy' ),
				plugins_url( "colors/light/css/eye-candy-light.css", __DIR__ ),
				array( '#555555', '#dddddd', '#f1f1f1', '#f6fbfd' ),
				array( 'base' => '#f1f2f3', 'focus' => '#fff', 'current' => '#fff' )
			);

		}

	}

	/**
	 * Add plugin link in plugins list to options page
	 */
	function add_settings_link_plugin( $links ) {
		$links[] = '<a href="'. esc_url( get_admin_url(null, 'themes.php?page=eye-candy-settings') ) .'">Settings</a>';
		$links[] = '<a href="' . esc_url( get_admin_url(null, 'profile.php') ) . '" target="_blank">Select color scheme</a>';
		return $links;
	}


	function add_theme_assets()	{

		$current_color = get_user_option( 'admin_color', get_current_user_id() );

		if ( $current_color === 'eye_candy_light' ) {

			wp_register_script( 'sws-buttons', plugins_url( 'colors/light/js/buttons.js', __DIR__ ), array( 'jquery' ) );
			wp_enqueue_script( 'sws-buttons' );

		}

		wp_register_script( 'eye-candy-admin', plugins_url( 'assets/js/eye-candy-admin.js', __DIR__ ), array( 'jquery' ) );
		wp_enqueue_script( 'eye-candy-admin' );
		wp_enqueue_script( 'underscore' );

		// Media lib scripts
		wp_enqueue_media();

	}



}

global $spl_colors;
$spl_colors = new Sws_Eye_Candy_Theme;
