<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login demo</title>
</head>
   
<body>
 <?php
 	echo '<b style="color:red">' . $this->session->flashdata('mess') . '</b>';
    echo form_open();
    echo form_fieldset("Login");
    echo "<div>" . form_label("username: ").form_input($user,set_value('username'))."</div><br />";
    echo '<b style="color:red">' . form_error('username') . "</b>";
    echo "<div>" . form_label("Password: ").form_password($pass,set_value('password'))."</div><br />";
    echo '<b style="color:red">' . form_error('password') . "</b>";
    echo form_label(" ").form_submit("ok",  "login");
    echo form_fieldset_close();
    echo form_close();
?>
</body>
</html>