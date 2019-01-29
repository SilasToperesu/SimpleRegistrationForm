<?php include('data_server.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP AND MySQL User Registration Form</title>
		<link rel='stylesheet' type="text/css" href="stylesheet.css">
	</head>
	<body>
		<div class= "header">
			<h2> Register </h2>
		</div>
		<form method = "POST" action="register.php">
			<!-- Display validation errors here -->
			<?php include('catch_errors.php'); ?>
			
			<div class="input-group">
				<label>First Name </label>
				<input type= "text" name="firstname">
			</div>
			<div class="input-group">
				<label>Last Name </label>
				<input type= "text" name="lastname" >
			</div>
			<div class="input-group">
				<label>Username </label>
				<input type= "text" name="username">
			</div>
			<div class="input-group">
				<label>Email </label>
				<input type= "text" name="email" >
			</div>
			<div class="input-group">
				<label>Password </label>
				<input type= "password" name="password1">
			</div>
			<div class="input-group">
				<label>Confirm password </label>
				<input type= "password" name="password2">
			</div>
			<div class="input-group">
				<button type= "submit" name="register" class="btn">Register</button>
			</div>
			<p>
				Already a member?<a href= "login.php"> Sign in </a>
			</p>
		</form>
	</body>
</html>