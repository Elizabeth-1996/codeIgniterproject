	<!DOCTYPE html>
<html>
<head>
<title>login</title>
</head>
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


	<form method="post" action="<?php echo base_url()?>first/reg_form">
		<table>
			<tr>
				<td>email</td>
		<td><input type="email" name="email" placeholder="email"></td>
			</tr>
			<tr>
		<td>password</td>
			<td><input type="password" name="password" placeholder="password"></td>
		</tr>
		<tr>

		<td><input type="submit" name="submit" value="login"></td>
		</tr>
		</table>
	</form>
</body>
</html>