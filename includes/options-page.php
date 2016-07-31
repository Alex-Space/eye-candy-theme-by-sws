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
	
	if ( isset( $_POST['refresh-page'] ) && $_POST['refresh-page'] === 'on' ) {
		?>
		<script>
			location.reload();
		</script>
		<?php
	}

	if ( isset( $_POST['sws-eye-candy-options'] ) && ! empty( $_POST['sws-eye-candy-options'] ) ) {

		update_user_meta( get_current_user_id(), 'eye_candy_options', $_POST['sws-eye-candy-options'] );
	
	}
	
	$options  = get_user_meta( get_current_user_id(), 'eye_candy_options', true );

	if ( isset( $options ) && ! empty( $options ) ) {

		$user_main_bg = isset( $options['main_bg'] ) && ! empty( $options['main_bg'] ) ? $options['main_bg'] : '';
		$user_menu_logo = isset( $options['menu_logo'] ) && ! empty( $options['menu_logo'] ) ? $options['menu_logo'] : '';
		$user_menu_logo_height = isset( $options['menu_logo_height'] ) && ! empty( $options['menu_logo_height'] ) ? $options['menu_logo_height'] : '';
		$menu_logo_paddings = isset( $options['menu_logo_paddings'] ) && ! empty( $options['menu_logo_paddings'] ) ? 'checked="checked"' : '';

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

						<input type="hidden" value="<?php echo $user_main_bg; ?>" name="sws-eye-candy-options[main_bg]" class="sws-eye-candy-select-bg-input">
					</td>
					<td>
						<p><b>A lot of cool background patterns:</b></p>
						<a target="_blank" href="http://subtlepatterns.com/">http://subtlepatterns.com/</a>
					</td>
				</tr>
				<tr class="sws-admin-menu-logo">
					<th>Admin menu logo</th>
					<td>

						<div class="sws-thumb-box">
							<?php if ( isset( $user_menu_logo ) && ! empty( $user_menu_logo ) ) : ?>
									<i class="dashicons dashicons-trash"></i>
									<img src="<?php echo $user_menu_logo; ?>" alt="" class="sws-eye-candy-thumb">
							<?php else : ?>
								<a href="#" class="sws-eye-candy-select-logo button button-small">Upload logo</a>
							<?php endif; ?>
						</div>

						<input type="hidden" value="<?php echo $user_menu_logo; ?>" name="sws-eye-candy-options[menu_logo]" class="sws-eye-candy-select-logo-input">
					</td>
					<td>
						<label>
							<span>Logo height</span>
							<input type="text" value="<?php echo $user_menu_logo_height; ?>" placeholder="For examle: 40, 100, 20" name="sws-eye-candy-options[menu_logo_height]">
							<p><i>Set it manualy! Without it logo will be hidden</i></p>
						</label>
						<label>
							<input type="checkbox" name="sws-eye-candy-options[menu_logo_paddings]" <?php echo $menu_logo_paddings; ?>>
							<b>Use paddings</b>
							<p><i>If logo sticks to edges</i></p>
						</label>
						
					</td>
				</tr>
				<tr class="hidden-settings">
					<input type="hidden" name="refresh-page" value="on">
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

