<?php
/**
 * Snippet #2: Uitschakelen toolbar
 * Status: inactive
 * Scope: front-end
 */

add_action( 'wp', function () {
	if ( ! current_user_can( 'manage_options' ) ) {
		show_admin_bar( false );
	}
} );