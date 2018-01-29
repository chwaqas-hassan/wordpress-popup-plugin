<?php

// Register style sheet.
function st_optin_styles() {
	wp_register_style( 'st-optin-css', plugins_url( 'st-popup/optin-form/optin.css' ) );
	wp_enqueue_style( 'st-optin-css' );
}

// Register style sheet
add_action( 'wp_enqueue_scripts', 'st_optin_styles' );

// Register scripts
function st_optin_js() {
	wp_register_script( 'st-optin-js', plugins_url( 'st-popup/optin-form/optin.js' ) );
	wp_enqueue_script( 'st-optin-js' );
}

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'st_optin_js' );

?>
<!-- Html -->
<div class="news-letter-modal" id="myModal">
</div>

<div class="form-content">
	
	<span class="close cursor" onclick="closeModal();">&times;</span>
	
	<h2 class="optin-form-heading">Get a Free Quote:</h2>
	
	<div class="form-group">
	  <h3>Name:</h3>
	  <input type="text" class="form-control text-box" placeholder="Enter name" required="" id="name">
	  <div id="empty-name" style="width: 50%; margin: 0 auto"></div>
	</div>
	
	<div class="form-group">
	  <h3>Email</h3>
	  <input type="email" class="form-control text-box" placeholder="Enter email" required="" id="email">
	  <div id="empty-email" style="width: 50%; margin: 0 auto"></div>
	</div>
	
	<div class="form-group">
		<h3>Service:</h3>
  		<select class="form-control text-box" id="our-services">
  			<option value="0">Select Service</option>
  			<option value="web-development">Web Development</option>
  			<option value="wordPress-development">WordPress Development</option>
  			<option value="digital-marketing">Digital Marketing</option>
  			<option value="graphics-designing">Graphics Designing</option>
  			<option value="accounting-systems">Accounting Systems</option>
  			<option value="pos-ledger">Point of Sale & Ledger</option>
  		</select>
	  	<div id="empty-service" style="width: 50%; margin: 0 auto"></div>
	</div>  	
	
	<div class="form-group box-buttons">
		<div class="alert alert-success output-msg" id="optin-output"></div>
		<input type="button" value="Send" class="btn btn-info buttons" id="submit">
	</div>

</div>