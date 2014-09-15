<!DOCTYPE html>
<html>
<head>
<title> A Chat Application</title>

<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>style/style.css" />

<script src="<?php echo base_url(); ?>scripts/jquery-2.1.1.min.js" type="text/javascript" ></script>
<script src="<?php echo base_url(); ?>scripts/chat.js" type="text/javascript" ></script>

<script>
	
	var chat_id = "<?php echo $chat_id; ?>";
	var user_id = "<?php echo $user_id; ?>";
	var url = "<?php echo base_url().'chat/ajax_add_chat_message'; ?>";

</script>


</head>
<body>
<h1>This is a Simple Chat Application</h1>
<?php
	echo heading('Chat Application', 3);
?>

<p>Let's do some chatting</p>
<hr />

<div id="chat_view"></div>

	<div id="chat_input">
	
	<input type="text" id="chat_message" name="chat_message" value="" />
	
	<?php echo anchor('#', 'Say it', array('title' => 'Send this chat message', 'id' => 'submit_message')); ?>
	<div class="clearer"></div>
	
</div>

</body>
</html>
	
