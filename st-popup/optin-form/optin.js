// jQuery( document ).ready( function( $ ) {
	
	//var errors = [];
	
	//var root_dir = "/k/segen-tech/site";
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
	  	if(!jQuery("div.news-letter-modal").is(':visible'))
	    {
	        //Showing content using jQuery slideDown function
	        jQuery("div.news-letter-modal").show(100);
	        jQuery("div.form-content").delay(150).slideDown();;
	    }
	}

	function closeModal()
	{
	  	jQuery("div.news-letter-modal").delay(400).hide(100);
		jQuery("div.form-content").slideUp();
		
		//jQuery("div.form-content").hide(400);
	}

// } );	
// optin form
// $("#submit").click(function() 
// {
	
// 	if ($("#name").val() === '' || $("#email").val() === '' || $("#our-services").val() === '0') 
// 	{
// 		if ($("#name").val() === '') {
// 			// $("#name").addClass('alert alert-danger');
// 			$('#empty-name').append('<p class="alert alert-danger" style="padding:0;">Enter your name!</p>');
// 		}
		
// 		if ($("#email").val() === '') {
// 			// $("#email").addClass('alert alert-danger');
// 			$('#empty-email').append('<p class="alert alert-danger" style="padding:0;">Enter your email!</p>');
// 		}

// 		if ($("#our-services").val() === '0') {
// 			$('#empty-service').append('<p class="alert alert-danger" style="padding:0;">Select a service you want!</p>');
// 		}
// 	}
// 	else{

		
// 		// console.log(root_dir);
// 		var data = {
// 		    name: $("#name").val(),
// 		    email: $("#email").val(),
// 		    service: $("#our-services").val(),
// 		};
// 			//console.log(data);
// 		$.ajax({
// 		    method: "POST",
// 		    url: root_dir+"/inc/get-quote.php",
// 		    data: data,
// 		    success: function(data){
// 		     	// document.getElementById("#output").innerHTML = "Thanks, Message Sent!";
// 		     	$('#optin-output').append('<p><strong>Successfuly!</strong> Message Sent.</p>');
// 		     	$("#optin-output").show().delay(5000).fadeOut();
// 		    }
// 		});
		
// 		console.log(data);
// 		$("#name").val('');
// 		$("#email").val('');
// 		$("#our-services").val('')
// 	}
// });

//Get in touch
// $("#get_contact").click(function() 
// {
	
// 	if ($("#contact_name").val() == '' || $("#contact_email").val() == '' || $("#contact_subject").val() == '' || $("#contact_message").val() == '') 
// 	{
// 		if ($("#contact_name").val() === '') {
// 			$('#empty-contact-name').append('<p class="alert alert-danger warning" >Enter your name!</p>');
// 			// $('#contact_name').addClass('alert alert-danger');
// 			// console.log("get name");
// 		}
		
// 		if ($("#contact_email").val() === '') {
// 			// $('#contact_email').addClass('alert alert-danger');
// 			// console.log("get email");
// 			$('#empty-contact-email').append('<p class="alert alert-danger warning" >Enter your email!</p>');
// 		}

// 		if ($("#contact_subject").val() === '') {
// 			// $('#contact_subject').addClass('alert alert-danger');
// 			// console.log("get subject");
// 			$('#empty-contact-subject').append('<p class="alert alert-danger warning" >Enter subject!</p>');
// 		}

// 		if ($("#contact_message").val() === '') {
// 			// $('#contact_message').addClass('alert alert-danger');
// 			// console.log("get message");
// 			$('#empty-contact-message').append('<p class="alert alert-danger warning" >Enter your message!</p>');
// 		}
// 	}
// 	else{

// 		// console.log(root_dir);
// 		var data = {
// 		    name: $("#contact_name").val(),
// 		    email: $("#contact_email").val(),
// 		    subject: $("#contact_subject").val(),
// 		    message: $("#contact_message").val(),
// 		};
// 			//console.log(data);
// 		$.ajax({
// 		    method: "POST",
// 		    // url: root_dir+"/inc/get-quote.php",
// 		    url: root_dir+"/inc/email.php",
// 		    data: data,
// 		    success: function(data){
// 		    	// console.log(data);
// 		     // 	document.getElementById("output").;
// 		     	$('#contact-output').append('<p><strong>Successfuly!</strong> Message Sent.</p>');
// 		     	$("#contact-output").show().delay(5000).fadeOut();
// 		    }
// 		});
		
// 		// console.log(data);
// 		$("#contact_name").val('');
// 		$("#contact_email").val('');
// 		$("#contact_subject").val('');
// 		$("#contact_message").val('');
// 	}

// });
