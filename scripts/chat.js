$(document).ready(function() {


	$('#container').animate({ scrollTop: $(document).height() }, "fast");
	
	setInterval(function() { get_chat_messages(); } , 4000);
	
	$('input#chat_message').keypress(function(e) {
		
		if(e.which == 13)
		{
			$('a#submit_message').click();
			
			return false;
			
		}
	
	});
	
	$('a#submit_message').click(function() {
		
		var url = base_url + 'chat/ajax_add_chat_messages';
		var form_data = {
			chat_id : chat_id,
			username : username,
			chat_message_content : $('input#chat_message').val()
		
		};
		
		$.ajax({
			url : url,
			data : form_data,
			type : 'POST',
			success : function(data) {
				
				$('div#container').html(data);
				
				$('input#chat_message').val('');
				
				$("#container").animate({ scrollTop: $(document).height() }, "fast");			
			},
			
			error : function(val1, val2, val3) {
				alert(val1);
				alert(val2);
				alert(val3);
			
			}
		
		
		});
		
		
		return false;
		
		get_chat_messages();
		
		PlaySound("sound1");	
		
	});

	function get_chat_messages()
	{
		var url = base_url + 'chat/ajax_get_chat_messages';
		
		var form_data = {
			chat_id : chat_id,
			username : username
		};
		
		$.ajax({
			url : url,
			data : form_data,
			type : 'POST',
			success : function(data) {
				
				
				if(data != '')
				{

					$('div#container').html(data);
					
					$('#container').animate({ scrollTop: $(document).height() }, 'fast');					
				}
				
			},
			
			
			error : function(val1, val2, val3) {
				alert('nothing');
			
			}
			
		
		});
	
	}
	
	function PlaySound(soundObj) 
	{
	  var sound = document.getElementById(soundObj);
	  sound.Play();
	}
	
	get_chat_messages();
	
	
});