<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login demo</title>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
.create{
	border: 1px solid;
	background: lightblue;
	width: 105px;
	height: auto;
	text-align: center;
}
a{
	text-decoration: none;
}
</style>
</head>
   
<body>
<a href="<?php echo base_url('/create')?>">
	<div class="create">
		create user
	</div>
</a>
<?php echo '<b style="color:red">' . $this->session->flashdata('mess') . '</b>';?>
</br>
<table style="width:100%">
	<tr>
    <th>id</th>
    <th>username</th>
    <th colspan="2">function</th>
  </tr>
  <?php
  		foreach ($users as $value) {
  ?>
  <tr>
    <td><?php echo $value['id']?></td>
    <td><?php echo $value['username']?></td>
    <td><a href="<?php echo base_url('/edit/' . $value['id'])?>">edit</a></td>
    <td><a href="<?php echo base_url('/delete/' . $value['id'])?>">delete</a></td>
  </tr>
  <?php }?>
</table>
<br>
<a href="<?php echo base_url('/login')?>">logout...</a>
</body>
</html>