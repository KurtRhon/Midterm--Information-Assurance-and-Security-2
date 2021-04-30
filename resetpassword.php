<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Reset Password</h2>
	</div>
	
	<form method="post" action="resetpassword.php">

		<?php include('errors.php'); ?>
        
        <div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Old Password</label>
			<input type="password" name="password_0">
		</div>
		<div class="input-group">
			<label>New Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reset_pass">Change</button>
		</div>
		<p align="left">
		   <a href="index.php">Go Back>></a>
		</p>
	</form>
</body>
</html>