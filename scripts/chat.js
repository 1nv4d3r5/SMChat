$(document).ready(function() {
	
	$('a#submit_message').click(function() {
		
		var form_data = {
			chat_id : chat_id,
			user_id : user_id,
			chat_message_content : $('input#chat_message').val()
		
		};
		
		$.ajax({
			url : url,
			data : form_data,
			type : 'POST',
			datatype: 'JSON',
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

	function get_chat_messages()
	{
		var url = base_url + 'chat/ajax_get_chat_message';
		
		var form_data = {
			chat_id: chat_id
		};
		
		$.ajax({
			url : url,
			data : form_data,
			type : 'POST',
			datatype: 'JSON',
			success : function(data) {
				
				if(data.status == 'ok')
				{
					$('div#chat_view').html(data.content);
				
				}
				else{
					//there was an error, do something
				
				}
			
			}
		
		
		});
	
	}
	
	get_chat_messages();
	
	
});