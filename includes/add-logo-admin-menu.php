<?php
function sws_admin_menu_custom_logo() {
	echo '
		<style>
			#adminmenuwrap {
				background: url(http://plugins/wp-content/uploads/2016/07/icon-256x256-4.jpg) no-repeat;
				background-size: 100%;
				padding-top: 150px;
			}
		</style>
	';

}
add_action( 'admin_head', 'sws_admin_menu_custom_logo' );

$debug_tags = array();
add_action( 'all', function ( $tag ) {
    global $debug_tags;
    if ( in_array( $tag, $debug_tags ) ) {
        return;
    }
    echo "<pre>" . $tag . "</pre>";
    $debug_tags[] = $tag;
} );

// function sws_admin_menu_custom_logo($menu) {
// 	pr($menu);
// 	echo 12;
// }
// add_action( 'adminmenu', 'sws_admin_menu_custom_logo');