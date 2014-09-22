<!DOCTYPE html>
<html>
<head><title></title>

<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>style/style.css" />

<script src="<?php echo base_url(); ?>scripts/jquery-2.1.1.min.js" type="text/javascript" ></script>
</head>

<script type="text/javascript">

var base_url = '<?php echo $base_url; ?>';

</script>
<script>
$(document).ready( function() {

	
	$('a.begin_chat').click(function() {

		var content = '<p>Choose a name ';
		content += '<input type="text" name="name" id="tmp_name" size="10" /></p>'
		
		$('div.chat_init').html(content);
		
		return false;
	
	});

	$('div.chat_init').on('keypress', 'input#tmp_name', function(e) {
		
		if(e.which == 13)
		{
			
			var date = new Date();
			var form_data = {
					name : $('input#tmp_name').val(),
					date : date.getTime()
			};
			
			var url = base_url + 'chat/start_chat';
			
			$.ajax({
				url : url,
				type : 'POST',
				data : form_data,
				success : function(data) {
					
					$('div.chat_init').remove();
					$('body').append(data);
				
				},
				error : function(val1, val2, val3) {
					alert(val1 + val2 + val3);
				
				}
				
			});
			
			return false;
			
		}
	
	});
	

});

</script>




<body>

<?php
 if(isset($isLoggedIn))
 {
 ?>
	<script type="text/javascript" >

		document.write('<div class="chat_init">');
		document.write('<p>Online</p><p><a href="#" class="begin_chat">Click to Chat</a></p>');
		document.write('</div>');

	</script>
	
<?php 
}

else
{
?>
	<script type="text/javascript" >

		document.write('<div class="chat_init">');
		document.write('<p>Offline</p>');
		document.write('</div>');

	</script>

<?php
}
?>






</body>
</html>