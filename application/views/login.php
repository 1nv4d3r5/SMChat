<!DOCTYPE html>
<html>
<head><title></title>

<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>style/style.css" />

<script src="<?php echo base_url(); ?>scripts/jquery-2.1.1.min.js" type="text/javascript" ></script>

</head>
<body>
<?php

echo '<div class="login_form">';

echo form_open('login/auth').'<p>';

echo form_label('Username', 'name');

$attrib1 = array('name' => 'name',
				 'id' => 'name',
				 'size' => 20
				);
echo form_input($attrib1).'</p><p>';

echo form_label('Password', 'password');

$attrib2 = array('name' => 'password',
				 'id' => 'password',
				 'size' => 20
				);
echo form_password($attrib2).'</p>';

echo form_submit('Login', 'submit');

echo form_close();

echo '</div>'

?>

</body>
</html>
