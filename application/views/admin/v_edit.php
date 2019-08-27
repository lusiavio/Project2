<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
			/*.cc{
				background-color: lightgrey;
			}*/
		</style>
	</head>
	<body>
		<?php foreach ($list_data as $pengguna){ ?>

		<form action="<?php echo base_url('index.php/c_project/update'); ?>" method="POST">
		<table align="center">
			<tr>
				<td>
					<input type="text" name="id_pengguna" size="50" value="<?php echo $pengguna->id_pengguna; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="username" size="50" value="<?php echo $pengguna->username; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="password" size="50" value="<?php echo $pengguna->password; ?>">
				</td>
			</tr>
			<tr>
				<td colspan="3" align="right">
					<input type="submit" name="submit" value="Edit Buku">
				</td>
			</tr>
		</table>
		<br/>
	</form>
		<?php }?>	
	</body>
</html>