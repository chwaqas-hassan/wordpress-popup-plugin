function add_new()
{
	var br = document.createElement("br");

	jQuery('#parent').append(
	'<h4> Form name: </h4><input type="text" name="optin_form_name" class="st-text-box" placeholder="form name..." required />'+
	'<h4>Html: </h4><textarea name="st_optin_html" class="st-popup-textarea" placeholder="Enter html..." required></textarea>'+
	'<h4>Css: </h4><textarea name="st_optin_css" class="st-popup-textarea" placeholder="Enter css..." required></textarea>' +
	'<h4>Js: </h4><textarea name="st_optin_js" class="st-popup-textarea" placeholder="Enter js..." required></textarea>' +	
	'<h4>Close button container container: <input id="container-1" name="st_close_container" type="radio" value="form" checked/>Form'+
	'<input id="container-1" name="st_close_container" type="radio" value="main"/>Main</h4>' + 
	'<h4>Close button position: <input id="position-1" name="st_close_position" type="radio" value="left" />Left'+
	'<input id="position-1" name="st_close_position" type="radio" value="right" checked/>Rigth</h4>' +
	'<h4>Form background color: <input type="color" name="st_optin_bg_color" value="#ff0000"></h4>' +
	'<input type="submit" name="create_optin" value="Create" class="st-popup-submit-button">' +
	'<input type="button" value="Cancel" onclick="removeElement();" class="st-popup-submit-button" >'
	);

	document.getElementById("add-new").disabled = true;
}

function removeElement() 
{
    // Removing all all child
    var parent = document.getElementById("parent");
	parent.innerHTML = '';

	// Enable button
    if (document.getElementById("add-new").disabled = false) {
    	document.getElementById("add-new").disabled = false;
    	console.log("enable");
    }
}

jQuery(document).ready(function(){
    jQuery('#st-optin_list').DataTable();
});