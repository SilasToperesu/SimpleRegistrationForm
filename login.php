<?php include('data_server.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP AND MySQL User Registration Form</title>
		<link rel='stylesheet' type="text/css" href="stylesheet.css">
	</head>
	<body>
		<div class= "header">
			<h2>Login </h2>
		</div>
		<form method = "POST" action="login.php">
			<!-- Display validation errors here -->
			<?php include('catch_errors.php'); ?>
			
			<div class="input-group">
				<label>Username </label>
				<input type= "text" name="username">
			</div>
			<div class="input-group">
				<label>Password </label>
				<input type= "password" name="password">
			</div>
			<div class="input-group">
				<button type= "submit" name="login" class="btn">Login</button>
			</div>
			<p>
				New member Register here!<a href= "register.php">Sign up </a>
			</p>
		</form>
	</body>
</html>