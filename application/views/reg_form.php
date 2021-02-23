<!DOCTYPE html>
<html>
<head>
	<title></title>
<style>
	form
	{
		border:2px solid;
		margin-left:400px;
		width:400px;
		text-align:center;

	}
	input
	{
		padding:10px;
		margin:20px;
	}
	
</style>
</head>
<body>
	<form method="post" action="<?php echo base_url()?>first/reg_form">
		<table>
			<h1>Registration form</h1>
			<tr><td>
				First Name:</td><td><input type="text" name="firstname"></td></tr>
			<tr><td>
				Last Name:</td><td><input type="text" name="lastname"></td></tr>
			<tr><td>
				Username:</td><td><input type="text" name="username"></td></tr>
			<tr><td>	
				Mobile:</td><td><input type="text" name="mobile"></td></tr>
				<tr><td>	
				Email:</td><td><input type="email" name="email"></td></tr>
			<tr><td>
				Password:</td><td><input type="password" name="password"></td></tr>
				</table>
				<input type="submit" name="register" align="center">
		
	</form>
</body>
</html>