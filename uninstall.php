<?php
/**
 * Remove data from DB
 */
update_user_meta( get_current_user_id(), 'admin_color', 'fresh' );
delete_user_meta( get_current_user_id(), 'eye_candy_options', '' );
