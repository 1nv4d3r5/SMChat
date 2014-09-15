$(document).ready(function() {
	
	$('a#submit_message').click(function() {
		
		alert($('input#chat_message').val());
		
		return false;
	
	});

});