<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Verify Code</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Verify Code</h2>
	</div>
	
	<form method="post" action="verify.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Enter code here: </label>
			<input type="text" name="code" >
		</div>
		
		<div class="input-group">
			<button type="submit" class="btn" name="Submit">Submit Code</button>
		</div>
		<p align="center">
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	
	</form>


</body>
</html>