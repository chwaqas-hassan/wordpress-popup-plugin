<?php // My plugin settings page


//Exit if file called directly
if (! defined( 'ABSPATH' )) {
	exit;
}

// Including stylesheet for settings page
wp_enqueue_style( 'st-popup-css', plugin_dir_url( dirname( __FILE__ ) ) . 'public/css/st_popup.css', array(), null, 'screen' );

// Including javascript
wp_enqueue_script( 'st-popup-js', plugin_dir_url( dirname( __FILE__ ) ) . 'public/js/st_popup.js', array(), null, 'screen' );

wp_enqueue_style( 'st-datatables-css', plugin_dir_url( dirname( __FILE__ ) ) . 'public/datatables/data-tables.min.css', array(), null, 'screen' );

// Including javascript
wp_enqueue_script( 'st-datatables-js', plugin_dir_url( dirname( __FILE__ ) ) . 'public/datatables/data-tables.min.js', array(), null, 'screen' );


// display plugin setting page
function st_popup_display_settings_page()
{
?>
<div class="wrap">
<?php

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;

	// Update form
	if (isset($_POST['update_optin']))
	{
		$arr_index = $_POST['form_index'];

		// Getting values from DB
		$form_name = unserialize(get_option( 'st_optin_form_name' ));
		$html_code = unserialize(get_option( 'st_optin_html_code' ));
		$css_code = unserialize(get_option( 'st_optin_css_code' ));
		$js_code = unserialize(get_option( 'st_optin_js_code' ));
		$old_pos = unserialize(get_option( 'st_optin_icon_position' ));
		$old_container = unserialize(get_option( 'st_optin_icon_container' ));
		$old_bg_colors = unserialize(get_option( 'st_optin_bg_color' ));

		if ( empty($_POST['new_form_name']) || empty($_POST['new_optin_html']) || empty($_POST['new_optin_css']) || empty($_POST['new_optin_js']) ) 
		{
			if (empty($_POST['new_form_name']) || $_POST['new_form_name'] == "0") {
				echo '<p class="st-error-msg">Invalid form name!</p>';
			}
			if (empty($_POST['new_optin_html'])) {
				echo '<p class="st-error-msg">Enter html!</p>';
			}
			if (empty($_POST['new_optin_css'])) {
				echo '<p class="st-error-msg">Enter css!</p>';
			}
			if (empty($_POST['new_optin_js'])) {
				echo '<p class="st-error-msg">Enter js!</p>';
			}
		}
		else
		{	
			$name =	$_POST['new_form_name'];
			$html = $_POST['new_optin_html'];
			$css = $_POST['new_optin_css'];
			$js = $_POST['new_optin_js'];
			$cont = $_POST['new_container'];
			$pos = $_POST['new_position'];
			$color = $_POST['new_st_bg_color'];
			// $id = $_POST['optin_form_id'];
			
			for ($i=0; $i <= count($form_name)-1 ; $i++)
			{ 
				if ($form_name[$i] == $form_name[$arr_index])
				{
					$form_name[$i] = $name;
					$html_code[$i] = $html;
					$css_code[$i] = $css;
					$js_code[$i] = $js;
					$old_pos[$i] = $pos;
					$old_container[$i] = $cont;
					$old_bg_colors[$i] = $color;

					if ( update_option( 'st_optin_form_name', serialize($form_name) ) )
					{
						echo '<p class="st-success-msg">Name updated successfuly!</p>';
					}

					if (update_option( 'st_optin_html_code', serialize($html_code) ))
					{
						echo '<p class="st-success-msg">HTML updated successfuly!</p>';
					}

					if (update_option( 'st_optin_css_code', serialize($css_code) ))
					{
						echo '<p class="st-success-msg">CSS updated successfuly!</p>';
					}

					if (update_option( 'st_optin_js_code', serialize($js_code) ))
					{
						echo '<p class="st-success-msg">JS updated successfuly!</p>';
					}

					if ( update_option( 'st_optin_icon_position', serialize($old_pos)) )
					{
						echo '<p class="st-success-msg">Icon position updated successfuly!</p>';
					}

					if ( update_option( 'st_optin_icon_container', serialize($old_container)) )
					{
						echo '<p class="st-success-msg">Icon container updated successfuly!</p>';
					}

					if ( update_option( 'st_optin_bg_color', serialize($old_bg_colors)) )
					{
						echo '<p class="st-success-msg">Background color updated successfuly!</p>';
					}
				}
			}
		}
	}

	// Edit form
	if (isset($_POST['edit_optin']))
	{
		$index = $_POST['hidden_index'];
		
		// Getting values from DB
		$form_name = unserialize(get_option( 'st_optin_form_name' ));
		$html_code = unserialize(get_option( 'st_optin_html_code' ));
		$css_code = unserialize(get_option( 'st_optin_css_code' ));
		$js_code = unserialize(get_option( 'st_optin_js_code' ));
		$icon_containers = unserialize(get_option( 'st_optin_icon_container' ));
		$positions = unserialize(get_option( 'st_optin_icon_position' ));
		$bg_colors = unserialize(get_option( 'st_optin_bg_color' ));
		
		for ($i=0; $i <= count($form_name)-1 ; $i++)
		{ 
			if ($form_name[$i] === $form_name[$index])
			{
?>
	<form method="post">

		<div class="form-controls">
			<h3>Form name:</h3>
			<input type="text" name="new_form_name" placeholder="form name..." class="st-text-box" value="<?php echo stripslashes($form_name[$i]); ?>" required>
		</div>

		<div class="form-controls">
			<h3>Html:</h3>
			<textarea name="new_optin_html" class="st-popup-textarea" required placeholder="Enter html..." ><?php echo stripslashes($html_code[$i]); ?></textarea>
		</div>

		<div class="form-controls">
			<h3>Css:</h3>
			<textarea name="new_optin_css" class="st-popup-textarea" required placeholder="Enter css..." ><?php echo $css_code[$i]; ?></textarea>
		</div>

		<div class="form-controls">
			<h3>Js</h3>
			<textarea name="new_optin_js" class="st-popup-textarea" required placeholder="Enter js..." ><?php echo stripslashes($js_code[$i]); ?></textarea>
		</div>

		<div class="form-controls">
			<h3>Close button position:</h3>
		<?php
		if($positions[$i] == "left")
		{
			echo '<input type="radio" name="new_position" value="'.$positions[$i].'" checked />'.'<span>'.$positions[$i].'</span>';
			echo '<input type="radio" name="new_position" value="right" >'.'<span>Right</span>';
		}
		else
		{
			echo '<input type="radio" name="new_position" value="'.$positions[$i].'" checked />'.'<span>'.$positions[$i].'</span>';
			echo '<input type="radio" name="new_position" value="left" >'.'<span>Left</span>';
		}
		?>
		</div>

		<div class="form-controls">
			<h3>Close button container:</h3>
		<?php
		if ($icon_containers[$i] == "form") {
			echo '<input type="radio" name="new_container" value="'.$icon_containers[$i].'" checked />'.'<span>'.$icon_containers[$i].'</span>';
			echo '<input type="radio" name="new_container" value="main" >'.'<span>Main</span>';
		}
		else
		{
			echo '<input type="radio" name="new_container" value="'.$icon_containers[$i].'" checked />'.'<span>'.$icon_containers[$i].'</span>';
			echo '<input type="radio" name="new_container" value="form" >'.'<span>Form</span>';
		}
		?>
		</div>

		<div class="form-controls">
			<h3>Background color:  </h3>
			<input type="color" name="new_st_bg_color" value="<?php echo $bg_colors[$i]; ?>">
		</div>

		<div class="form-controls">
			<input type="submit" name="update_optin" value="Update form"  class="st-popup-submit-button">
			<input type="hidden" name="form_index" value="<?php echo $index; ?>">
			<input type="submit" name="update_optin" value="Cancel"  class="st-popup-submit-button">
		</div>
	</form>
<?php				
			}	
		}
	}

	// Delete action
	if (isset($_POST['delete_optin']))
	{
		$index = $_POST['hidden_index'];

		// Getting values from DB
		$old_form_id = unserialize(get_option( 'st_optin_forms_id' ));
		$form_name = unserialize(get_option( 'st_optin_form_name' ));
		$html_code = unserialize(get_option( 'st_optin_html_code' ));
		$css_code = unserialize(get_option( 'st_optin_css_code' ));
		$js_code = unserialize(get_option( 'st_optin_js_code' ));
		$old_pos = unserialize(get_option( 'st_optin_icon_position' ));
		$old_container = unserialize(get_option( 'st_optin_icon_container' ));
		$old_colors = 	unserialize(get_option( 'st_optin_bg_color' ));
		// deleting value by index
		unset($old_form_id[$index]);
		unset($form_name[$index]);
		unset($html_code[$index]);
		unset($css_code[$index]);
		unset($js_code[$index]);
		unset($old_pos[$index]);
		unset($old_container[$index]);
		unset($old_colors[$index]);

		
		// Re arrangeing arrays
		$new_id = array_values($old_form_id);
		$new_name = array_values($form_name);
		$new_html = array_values($html_code);
		$new_css = array_values($css_code);
		$new_js = array_values($js_code);
		$new_container = array_values($old_container);
		$new_positions = array_values($old_pos);
		$new_colors = array_values($old_colors);
		
		if (update_option( 'st_optin_forms_id', serialize($new_id) ))
		{
			if (update_option( 'st_optin_form_name', serialize($new_name) ))
			{
				if (update_option( 'st_optin_html_code', serialize($new_html) ))
				{
					if (update_option( 'st_optin_css_code', serialize($new_css) ))
					{
						if (update_option( 'st_optin_js_code', serialize($new_js) )) {
							
							if (update_option( 'st_optin_icon_container', serialize($new_container) ))
							{
								if (update_option( 'st_optin_icon_position', serialize($new_positions) ))
								{
									if (update_option( 'st_optin_bg_color', serialize($new_colors) ))
									{
										echo '<p class="st-success-msg">Form deleted successfuly!</p>';
									}
									else
									{
										echo '<p class="st-error-msg">Deletion failed!</p>';
									}
								}
								else
								{
									echo '<p class="st-error-msg">Deletion failed!</p>';
								}
							}
							else
							{
								echo '<p class="st-error-msg">Deletion failed!</p>';
							}
						}
						else
						{
							echo '<p class="st-error-msg">Deletion failed!</p>';
						}
					}
					else
					{
						echo '<p class="st-error-msg">Deletion failed!</p>';
					}
				}
				else
				{
					echo '<p class="st-error-msg">Deletion failed!</p>';
				}
			}
			else
			{
				echo '<p class="st-error-msg">Deletion failed!</p>';
			}
		}
		else
		{
			echo '<p class="st-error-msg">Deletion failed!</p>';
		}
	}

	// Create form
	if (isset($_POST['create_optin'])) 
	{
		if ( empty($_POST['st_optin_html']) || empty($_POST['st_optin_css']) || empty($_POST['st_optin_js']) || empty($_POST['optin_form_name']) ) 
		{
			if (empty($_POST['optin_form_name']) || $_POST['optin_form_name'] == "0") {
				echo '<p class="st-error-msg">Invalid form name!</p>';
			}
			if (empty($_POST['st_optin_html'])) {
				echo '<p class="st-error-msg">Enter html!</p>';
			}
			if (empty($_POST['st_optin_css'])) {
				echo '<p class="st-error-msg">Enter css!</p>';
			}
			if (empty($_POST['st_optin_js'])) {
				echo '<p class="st-error-msg">Enter js!</p>';
			}
		}
		else
		{
			// New values
			$html_code = $_POST['st_optin_html'];
			$css_code = $_POST['st_optin_css'];
			$js_code = $_POST['st_optin_js'];
			$new_form_name = $_POST['optin_form_name'];
			$st_bg = $_POST['st_optin_bg_color'];
			$st_container = $_POST['st_close_container'];
			$st_close_pos = $_POST['st_close_position'];

			// Getting old values
			$old_html = unserialize(get_option( 'st_optin_html_code' ));
			$old_css = unserialize(get_option( 'st_optin_css_code' ));
			$old_js = unserialize(get_option( 'st_optin_js_code' ));
			$old_form_name = unserialize(get_option( 'st_optin_form_name' ));
			$old_form_id = unserialize(get_option( 'st_optin_forms_id' ));
			$old_bg = unserialize(get_option( 'st_optin_bg_color' ));
			$old_pos = unserialize(get_option( 'st_optin_icon_position' ));
			$old_container = unserialize(get_option( 'st_optin_icon_container' ));

			if ($old_html == "0" && $old_css == "0" && $old_js == "0" && $old_form_name == "0" && $old_form_id == "0")
			{
				$old_form_id = 1;
				// converting values to arrays
				$name = array($new_form_name);
				$html = array($html_code);
				$css = array($css_code);
				$js = array($js_code);
				$id = array($old_form_id);
				$bg = array($st_bg);
				$container = array($st_container);
				$pos = array($st_close_pos);
				
				if (update_option( 'st_optin_forms_id', serialize($id) ))
				{
					if (update_option( 'st_optin_form_name', serialize($name) ))
					{
						if (update_option( 'st_optin_html_code', serialize($html) ))
						{
							if (update_option( 'st_optin_css_code', serialize($css) ))
							{
								if (update_option( 'st_optin_js_code', serialize($js) ))
								{
									//echo '<p class="st-success-msg">Form created!</p>';
									if (update_option( 'st_optin_icon_container', serialize($container) ))
									{
										if (update_option( 'st_optin_icon_position', serialize($pos) ))
										{
											if (update_option( 'st_optin_bg_color', serialize($bg) ))
											{
												echo '<p class="st-success-msg">Form created!</p>';
											}
											else
											{
												echo '<p class="st-error-msg">Invalid iackground color!</p>';
											}
										}
										else
										{
											echo '<p class="st-error-msg">Invalid icon position!</p>';
										}
									}
									else{
										echo '<p class="st-error-msg">Invalid icon container!</p>';
									}
								}
								else
								{
									echo '<p class="st-error-msg">Invalid js!</p>';
								}
							}
							else
							{
								echo '<p class="st-error-msg">Invalid css!</p>';
							}
						}
						else
						{
							echo '<p class="st-error-msg">Invalid html!</p>';
						}
					}
					else
					{
						echo '<p class="st-error-msg">Invalid formname!</p>';
					}	
				}
				else
				{
					echo '<p class="st-error-msg">Invalid form ID!</p>';
				}
			}
			else
			{
				// Getting last value of array
				$last_val = end($old_form_id);
				
				// Increament and push new value in array
				array_push($old_form_id, $last_val+1);
				
				$name = array($new_form_name);
				$html = array($html_code);
				$css = array($css_code);
				$js = array($js_code);
				$container = array($st_container);
				$pos = array($st_close_pos);
				$bg = array($st_bg);

				// Merging new values with old
				$new_name = array_merge($old_form_name, $name);
				$new_html = array_merge($old_html, $html);
				$new_css = array_merge($old_css, $css);
				$new_js = array_merge($old_js, $js);
				$new_container = array_merge($old_container, $container);
				$new_pos = array_merge($old_pos, $pos);
				$new_bg = array_merge($old_bg, $bg);

				if (update_option( 'st_optin_forms_id', serialize($old_form_id) ))
				{
					if (update_option( 'st_optin_form_name', serialize($new_name) ))
					{
						if (update_option( 'st_optin_html_code', serialize($new_html) ))
						{
							if (update_option( 'st_optin_css_code', serialize($new_css) ))
							{
								if (update_option( 'st_optin_js_code', serialize($new_js) ))
								{
									//echo '<p class="st-success-msg">New form created!</p>';
									if (update_option( 'st_optin_icon_container', serialize($new_container) ))
									{
										if (update_option( 'st_optin_icon_position', serialize($new_pos) ))
										{
											//echo '<p class="st-success-msg">Form created!</p>';
											if (update_option( 'st_optin_bg_color', serialize($new_bg) ))
											{
												echo '<p class="st-success-msg">Form created!</p>';
											}
											else
											{
												echo '<p class="st-error-msg">Invalid iackground color!</p>';
											}
										}
										else
										{
											echo '<p class="st-error-msg">Invalid icon position!</p>';
										}
									}
									else{
										echo '<p class="st-error-msg">Invalid icon container!</p>';
									}
								}
								else
								{
									echo '<p class="st-error-msg">Invalid js!</p>';
								}
							}
							else
							{
								echo '<p class="st-error-msg">Invalid css!</p>';
							}
						}
						else
						{
							echo '<p class="st-error-msg">Invalid html!</p>';
						}
					}
					else
					{
						echo '<p class="st-error-msg">Invalid name!</p>';
					}
				}
				else
				{
					echo '<p class="st-error-msg">Invalid form ID!</p>';
				}	
			}
		}
	}

	// Getting options
	$optin_id = unserialize(get_option( 'st_optin_forms_id' ));
	$form_name = unserialize(get_option( 'st_optin_form_name' ));
	$html_code = unserialize(get_option( 'st_optin_html_code' ));
	$css_code = unserialize(get_option( 'st_optin_css_code' ));
	$js_code = unserialize(get_option( 'st_optin_js_code' ));
	$old_pos = unserialize(get_option( 'st_optin_icon_position' ));
	$old_container = unserialize(get_option( 'st_optin_bg_color' ));
?>
	
	<h3>Create Optin Form</h3>
	
	<?php
	if ($form_name == "0" || sizeof($form_name) == "0"  && $html_code == "0" || sizeof($html_code) == "0" && $css_code == "0" || sizeof($css_code) == "0" && $js_code == "0" || sizeof($js_code[0]) == "0" && $optin_id == "0" || sizeof($optin_id[0]) == "0")
	{
		//echo "0";
	?>
	<form method="post">
		<div class="form-controls">
			<h3>Form name:</h3>
			<input type="text" name="optin_form_name" placeholder="form name..." class="st-text-box" required>
		</div>

		<div class="form-controls">
			<h3>Html:</h3>
			<textarea name="st_optin_html" class="st-popup-textarea" placeholder="Enter html..." required></textarea>
		</div>

		<div class="form-controls">
			<h3>Css:</h3>
			<textarea name="st_optin_css" class="st-popup-textarea" placeholder="Enter css..." required></textarea>
		</div>

		<div class="form-controls">
			<h3>Js</h3>
			<textarea name="st_optin_js" class="st-popup-textarea" placeholder="Enter js..." required></textarea>
		</div>
		<h3>Optin Form Styles:</h3>
		<div class="st-style-inner">	
			
			<h4>
				Select background color of form:
				<input type="color" name="st_optin_bg_color" value="#ff0000">
			</h4>
			<h4>
				Select close icon container:
				<input type="radio" name="st_close_container" value="main">Main
				<input type="radio" name="st_close_container" value="form" checked = "checked" >Form
			</h4>
			<h4>
				Icon position:
				<input type="radio" name="st_close_position" value="left">Left
				<input type="radio" name="st_close_position" value="right" checked = "checked">Right
			</h4>
		</div>	
		<div class="form-controls">
		  <input type="submit" name="create_optin" value="Create"  class="st-popup-submit-button">
		</div>
	</form>	

	<?php
	}
	else
	{
	?>
		<form method="post" id="parent">
		</form>
		<div class="form-controls">
			<input type="button" value="Add new" id="add-new" class="st-popup-submit-button" onclick="add_new();">
		</div>
		<hr>
		<div class="form-controls">
			<table class="" id="st-optin_list">
				<thead>
					<tr>
						<td><b>Form ID</b></td>
						<td><b>Form name</b></td>
						<td><b>Shortcode</b></td>
						<td><b>Edit</b></td>
						<td><b>Delete</b></td>
					</tr>
				</thead>
				<tbody>	
	<?php

		for ($i=0; $i <= count($form_name)-1 ; $i++)
		{ 	
	?>
		<tr>
			<td><?php echo $optin_id[$i]; ?><form method="post"></td>
			<td><?php echo $form_name[$i]; ?></td>
			<td>[st_optin_form id="<?php echo $optin_id[$i]; ?>"]</td>
			<td>
				<a href="<?php echo $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']."?form_id=".$i; ?>">
				<input type="submit" id="<?php echo $i; ?>" name="edit_optin" class="action-btn st-edit" value="Edit" />
				</a>
				<input type="hidden" name="hidden_index" value="<?php echo $i; ?>">
			</td>
			<td>
				<input type="submit" name="delete_optin" class="action-btn st-delete" value="Delete" />
				</form>	
			</td>
		</tr>
	<?php
		}
	?>		</tbody>
			</table>
		</div>
	<?php
	}
	?>
	</div>
</div>
<div style="clear:both;">
<?php 
}



