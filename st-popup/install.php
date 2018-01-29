<?php

//Exit if file called directly
if (! defined( 'ABSPATH' )) {
	exit;
}

// add option
function st_optin_add_option() {


	$id = '1';
	$fm_html = '<div class="st-optin-wrapper">
<form method="post">
	<h2 class="text-box">Get a Free Quote:</h2>
	<div class="form-group">
	  <p class="text-box"><strong>Name:</strong></p>
	  <input type="text" class="form-control text-box" placeholder="Enter name" id="name" required />
	</div>
	<div class="form-group">
	  <p class="text-box"><strong>Email:</strong></p>
	  <input type="email" class="form-control text-box" placeholder="Enter email" id="email" required />
	</div>
	<div class="row">
	  	<div class="form-group">
	  		<select class="form-control text-box" id="our-services" required >
	  			<option value="0">Select Service</option>
	  			<option value="web-development">Web Development</option>
	  			<option value="wordPress-development">WordPress Development</option>
	  			<option value="digital-marketing">Digital Marketing</option>
	  			<option value="graphics-designing">Graphics Designing</option>
	  			<option value="accounting-systems">Accounting Systems</option>
	  			<option value="pos-ledger">Point of Sale & Ledger</option>
	  		</select>
	  	</div>
	</div>  	
	<div class="form-group box-buttons">
		<input type="submit" value="Send" class="btn btn-info buttons" id="submit">
	</div>
</form>
</div>';
	$fm_css = '.st-optin-wrapper {
    width: 80%;
    min-width: 200px;
    height: auto;
    margin: 0 auto;
    border-radius: 5px;
}
.form-group {
	margin: 0px auto;
}

.text-box {
	width: 100%;
	padding: 5px 3px;
	margin: 5px auto;
	
}
.box-buttons {
	text-align: center;
	margin: 0 auto;
}
.buttons {
	padding: 20px 70px !important;
	margin: 10px auto;
	border: none;
	font-size: 18px;
	font-weight: bold;
	border-radius: 5px;
}

.buttons:hover {

}
.optin-form-heading {
	text-align: center;
}';
	$name = 'Example Form 1';
	$fm_js = 'console.log("Thanks");';
	$pos1 = 'right';
	$cont1 = 'form';
	$bg1 = '#e0ebea';

	$id = array($id);
	$name = array($name);
	$html = array($fm_html);
	$css = array($fm_css);
	$js = array($fm_js);
	$pos = array($pos1);
	$cont = array($cont1);
	$bg = array($bg1);

	$id2 = '2';
	$name2 = 'Example form 2';
	$html2 = '<img src="https://ak9.picdn.net/shutterstock/videos/8010679/thumb/2.jpg" />';
	$css2 = 'img { width: 100%; }';
	$js2 = 'console.log("Thank you!")';
	$cont2 = 'main';
	$pos2 = 'left';
	$bg2 = '#5874a3';

	$id2 = array($id2);
	$name2 = array($name2);
	$html2 = array($html2);
	$css2 = array($css2);
	$js2 = array($js2);
	$cont2 = array($cont2);
	$pos2 = array($pos2);
	$bg2 = array($bg2);

	$ids = array_merge($id, $id2);
	$names = array_merge($name, $name2);
	$html_code = array_merge($html, $html2);
	$css_code = array_merge($css, $css2);
	$js_code = array_merge($js, $js2);
	$containers = array_merge($cont, $cont2);
	$positions = array_merge($pos, $pos2);
	$bgs = array_merge($bg, $bg2);

	add_option( 'st_optin_forms_id', serialize($ids) );
	add_option( 'st_optin_form_name', serialize($names) );
	add_option( 'st_optin_html_code', serialize($html_code) );
	add_option( 'st_optin_css_code', serialize($css_code) );
	add_option( 'st_optin_js_code', serialize($js_code) );
	add_option( 'st_optin_icon_container', serialize($containers) );
	add_option( 'st_optin_icon_position', serialize($positions) );
	add_option( 'st_optin_bg_color', serialize($bgs) );

}

?>