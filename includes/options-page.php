<?php
// Submenu creation
function sws_eye_candy_options_page() {

	add_submenu_page( 'themes.php', 'Eye Candy settings', 'Eye Candy settings',
	    'manage_options', 'eye-candy-settings', 'sws_options_page_callback' );

}
add_action( 'admin_menu', 'sws_eye_candy_options_page' );

// Submenu order
function sws_eye_candy_submenu_order( $menu_ord ) {
    
    global $submenu;
    $themes_submenu = $submenu['themes.php'];
    $arr = array();

    foreach ( $themes_submenu as $key => $value ) {
    	
    	if ( $value[0] === 'Eye Candy settings' ) {
		    
		    $arr[] = $value;
		    unset( $themes_submenu[$key] );

    	}

    }
    
   	$themes_submenu = $themes_submenu + $arr;

    $submenu['themes.php'] = $themes_submenu;

    return $menu_ord;

}
add_filter( 'custom_menu_order', 'sws_eye_candy_submenu_order' );

// Submenu view
function sws_options_page_callback() {

	if ( isset( $_POST['sws-eye-candy-options'] ) && ! empty( $_POST['sws-eye-candy-options'] ) ) {
		update_user_meta( get_current_user_id(), 'eye_candy_options', $_POST['sws-eye-candy-options'] );
		update_user_meta( get_current_user_id(), 'eye_candy_options', $_POST['sws-eye-candy-options'] );
	
	}
	
	$options  = get_user_meta( get_current_user_id(), 'eye_candy_options', true );
	
	if ( isset( $options ) && ! empty( $options ) ) {
		$user_main_bg = $options['main_bg'];
		$user_main_logo = $options['menu_logo'];
	}

	?>
	<div class="wrap">
		
		<h1>Eye Candy Settings</h1>
		
		<form action="" method="post">
			<table class="form-table">
				<tr class="sws-admin-bg">
					<th>Admin Background</th>
					<td>

						<div class="sws-thumb-box">
							<?php if ( isset( $user_main_bg ) && ! empty( $user_main_bg ) ) : ?>
									<i class="dashicons dashicons-trash"></i>
									<img src="<?php echo $user_main_bg;?>" alt="" class="sws-eye-candy-thumb">
							<?php else : ?>
								<a href="#" class="sws-eye-candy-select-bg-btn button button-small">Upload background</a>
							<?php endif; ?>
						</div>

						<input type="hidden" value="<?php echo isset( $user_main_bg ) ? $user_main_bg : ''; ?>" name="sws-eye-candy-options[main_bg]" class="sws-eye-candy-select-bg-input">
					</td>
				</tr>
				<tr class="sws-admin-menu-logo">
					<th>Admin menu logo</th>
					<td>

						<div class="sws-thumb-box">
							<?php if ( isset( $user_main_logo ) && ! empty( $user_main_logo ) ) : ?>
									<i class="dashicons dashicons-trash"></i>
									<img src="<?php echo $user_main_logo; ?>" alt="" class="sws-eye-candy-thumb">
							<?php else : ?>
								<a href="#" class="sws-eye-candy-select-logo button button-small">Upload logo</a>
							<?php endif; ?>
						</div>

						<input type="hidden" value="<?php echo isset( $user_main_logo ) ? $user_main_logo : ''; ?>" name="sws-eye-candy-options[menu_logo]" class="sws-eye-candy-select-logo-input">
					</td>
				</tr>
				<tr>
					<th>
						<button class="button">Save settings</button>
					</th>
				</tr>
			</table>
		</form>

	</div>

	<?php
}

