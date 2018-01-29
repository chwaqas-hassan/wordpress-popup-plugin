<?php // My plugin admin menu


//Exit if file called directly
if (! defined( 'ABSPATH' )) {
	exit;
}


// add top-level administrative menu
function st_popup_add_toplevel_menu() {
	
	/* 
		add_menu_page(
			string   $page_title, 
			string   $menu_title, 
			string   $capability, 
			string   $menu_slug, 
			callable $function = '', 
			string   $icon_url = '', 
			int      $position = null 
		)
	*/
	
	add_menu_page(
		'Optin Form Settings',
		'Optin Forms',
		'manage_options',
		'st_popup',
		'st_popup_display_settings_page',
		'dashicons-admin-generic',
		null
	);
	
}
add_action( 'admin_menu', 'st_popup_add_toplevel_menu' );