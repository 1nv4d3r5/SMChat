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
		var url2 = base_url + 'chat/ajax_get_chat_messages';
		
		var form_data = {
			chat_id: chat_id
		};
		
		$.ajax({
			url : url2,
			data : form_data,
			datatype : 'json',
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