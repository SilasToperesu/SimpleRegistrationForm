<?php include('data_server.php'); 

	//If user is not logged in, they can not access the page
	if(empty($_SESSION['username'])){
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP AND MySQL User Registration Form</title>
		<link rel='stylesheet' type="text/css" href="stylesheet.css">
	</head>
	<body>
		<div class= "header">
			<h2>Home Page </h2>
		</div>
		<div class= "main">
			<?php if(isset($_SESSION['positive'])): ?>
				<div class= "error positive">
					<h3>
						<?php
							echo $_SESSION['positive'];
							unset($_SESSION['positive']);
						?>
					</h3>
				</div>
			<?php endif ?>
			
			<?php if(isset($_SESSION['username'])): ?>
				<p>WelCome <strong><?php echo $_SESSION['username'];?></strong></p>
				<p><a href="home.php?logout='1'" style = "color: red;">Logout</a></p>
			<?php endif ?>
		</div>
	</body>
</html>