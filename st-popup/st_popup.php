<?php

/*
Plugin Name: ST Popup
Description: In this plugin, you can add optin forms to your selected pages
Version: 1.0
Author: Waqas Hassan
Plugin URI: https://developer.wordpress.org/plugins/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

//Exit if file called directly
if (! defined( 'ABSPATH' )) {
	exit;
}

// Activation hook
register_activation_hook( __FILE__, 'st_optin_add_option' );


// if admin area
if ( is_admin() ) {
	
	// Include dependencies
	require_once plugin_dir_path( __file__ ).'install.php';
	require_once plugin_dir_path( __file__ ).'admin/admin-menu.php'; 
	require_once plugin_dir_path( __file__ ).'admin/settings-page.php';
	// require_once plugin_dir_path( __file__ ).'uninstall.php';
}


add_shortcode('st_optin_form', 'create_optin');

function create_optin( $att )
{

	$atts = shortcode_atts(
		array(
			'id' => 1,
			
		), $atts, 'st_optin_form' );

    $id = $att["id"];
	$form_id = unserialize(get_option( 'st_optin_forms_id' ));
	$form_name = unserialize(get_option( 'st_optin_form_name' ));
	$html_code = unserialize(get_option( 'st_optin_html_code' ));
	$css_code = unserialize(get_option( 'st_optin_css_code' ));
	$js_code = unserialize(get_option( 'st_optin_js_code' ));
	$icon_position = unserialize(get_option( 'st_optin_icon_position' ));
	$icon_container = unserialize(get_option( 'st_optin_icon_container' ));
	$bg_colors = unserialize(get_option( 'st_optin_bg_color' ));

	if ($form_id == "0")
	{
		return;
	}

	if (($key = array_search($id, $form_id))===false) 
	{
		return;
	}


?>
<style>
/*  form container */
.st-popup-container {
  	display: none;
  	position: fixed;
  	left: 0;
  	padding-top: 50px;
	padding-bottom: 50px;
	top: 0px;
	width: 100%;
	height: 100%;
	overflow: auto;
	background: rgba(128,128,128,0.7);
	opacity:0.4;
	filter:alpha(opacity=40); /* For IE8 and earlier */
	z-index: 1000; /* Important to set this */
}

.st-form-container {
    display: none;
	z-index: 1001;
	position: fixed;
	top: 80px;
    left: 0;
    right: 0;
    width: 50%;
    min-width: 200px;
    height: auto;
    margin: 0 auto;
	border-radius: 5px;
	/*background-color: #f8f8f8;*/
	background-color: <?php echo $bg_colors[$key]; ?>;
	padding: 1px 0px !Important;
}
/* The Close Button */
.st-close {
  color: black;
  /*position: absolute;*/
  text-align: <?php echo $icon_position[$key]; ?>;
  width: 100%;
  margin-bottom: 0;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
  padding: 0px 10px;
}
.st-close:hover,
.st-close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}
@media screen and (max-width: 768px) {
	.st-form-container { width: 80%; margin-top: 20px; }
}

</style>
<div class="st-popup-container" id="popup-container">
	<?php
		if ($icon_container[$key] == "main")
		{
			echo '<p class="st-close cursor" onclick="closeModal();" style="padding: 0px 10px; color:white">×</p>';
		}
	?>
</div>

<div class="st-form-container">
	
	<?php
		if ($icon_container[$key] == "form")
		{
			echo '<p class="st-close cursor" onclick="closeModal();">×</p>';
		}
	?>
	
	<?php print_r(stripcslashes($html_code[$key])); ?>

</div>
<script>
	var get_quote = '';
	jQuery('body').mouseleave(function()
	{
		
		get_quote++;
		
		if (get_quote == 1) {
			openModal();
		}
	})

	function openModal()
	{
	  	if(!jQuery("div.st-popup-container").is(':visible'))
	    {
	        //Showing content using jQuery slideDown function
	        jQuery("div.st-popup-container").show(100);
	        jQuery("div.st-form-container").delay(150).slideDown();;
	    }
	}

	function closeModal()
	{
	  	jQuery("div.st-popup-container").delay(400).hide(100);
		jQuery("div.st-form-container").slideUp();
	}
</script>
<?php
	// Getting css and JS
	echo '<style>';
		print_r(stripcslashes($css_code[$key]));
	echo '</style>';

	echo '<script>';
	print_r(stripcslashes($js_code[$key]));
	echo '</script>';	
}

// add_action( 'wp', 'create_optin');


