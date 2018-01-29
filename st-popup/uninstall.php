<?php
/*
	
	uninstall.php
	
	- fires when plugin is uninstalled via the Plugins screen
	
*/

//Exit if file called directly
if (! defined( 'ABSPATH' )) {
	exit;
}


// // remove options on uninstall
// function st_optin_on_uninstall() {

	if ( ! current_user_can( 'activate_plugins' ) ) return;

	delete_option( 'st_optin_html_code' );
	delete_option( 'st_optin_css_code' );
	delete_option( 'st_optin_js_code' );
	delete_option( 'st_optin_form_name' );
	delete_option( 'st_optin_forms_id' );
	delete_option( 'st_optin_icon_container');
	delete_option( 'st_optin_icon_position');
	delete_option( 'st_optin_bg_color');

// }
// register_uninstall_hook( __FILE__, 'st_optin_on_uninstall' );

