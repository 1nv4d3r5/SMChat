<!DOCTYPE html>
<html>
<head>
<title> <!--A Chat Application --></title>

<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>style/style.css" />

<script src="<?php echo base_url(); ?>scripts/jquery-2.1.1.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url(); ?>scripts/chat.js" type="text/javascript" ></script>

<script>
	
	var chat_id = "<?php echo $chat_id; ?>";
	var username = "<?php echo $username; ?>";
	var base_url = "<?php echo $base_url; ?>";

</script>


</head>
<body>


<embed src="success.wav" autostart="false" width="0" height="0" id="sound1" enablejavascript="true">

<h1><!-- This is a Simple Chat Application --></h1>
<?php
	//echo heading('Chat Application', 3);
?>

<p>Let's do some chatting<a href="<?php echo base_url().'login/logout'; ?>">Logout</a></p>
<hr />

<div class="chat_window">
	<div id="container"></div>
	

		<div id="chat_input">
		
		<input type="text" id="chat_message" name="chat_message"  value="" />
		
		</div>
		
		<div class="clearer">
		<?php echo anchor('#', 'Say it', array('title' => 'Send this chat message', 'id' => 'submit_message')); ?>
		</div>
		
	</div>
</div>

</body>
</html>
	
