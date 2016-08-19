<?php
/**
 * Add admin styles from options
 */
function sws_eye_candy_admin_custom_styles() {

	$options = get_user_meta( get_current_user_id(), 'eye_candy_options', true );
	$logo_height = isset( $options['menu_logo_height'] ) && ! empty( $options['menu_logo_height'] ) ? $options['menu_logo_height'] : '0';
	$logo_image = isset( $options['menu_logo'] ) && ! empty( $options['menu_logo'] ) ? $options['menu_logo'] : '';
	$body_bg = isset( $options['main_bg'] ) && ! empty( $options['main_bg'] ) ? $options['main_bg'] : '';
	$menu_logo_paddings = isset( $options['menu_logo_paddings'] ) && $options['menu_logo_paddings'] === 'on' ? 'center 1% / 90%' : 'center top / 100%';

	echo '
		<style>

			body:not(.folded) #adminmenuwrap {
				background: url(' . $logo_image . ') ' . $menu_logo_paddings . ' no-repeat;
				padding-top: ' . $logo_height . 'px;
			}

			html, body {
				background: #f1f1f1 url(' . $body_bg . ');
			}

		</style>
	';

}
add_action( 'admin_head', 'sws_eye_candy_admin_custom_styles' );
