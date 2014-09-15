$(document).ready(function() {
	
	$('a#submit_message').click(function() {
		
		var form_data = {
			chat_id : chat_id,
			user_id : user_id,
			chat_message_content : $('input#chat_message').val()
		
		};
		
		if(chat_message_content == '')	{ return false; }
		
		$.ajax({
			url : url,
			data : form_data,
			datatype: json,
			success : function(data) {
				
				alert(data);
			
			},
			
			error : function(val1, val2, val3) {
				alert(val1);
				alert(val2);
				alert(val3);
			
			}
		
		
		});
		
		return false;
	
	});

});