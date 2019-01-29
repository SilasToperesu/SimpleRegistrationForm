<?php
	session_start();
	$username = "";
	$email = "";
	$errors = array();
	
	//Connect to the database
	$con = mysqli_connect('localhost', 'root', '', 'registration_form');
	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	//If the register button is clicked
	if(isset($_POST['register'])){
		$firstname  = mysqli_real_escape_string($con, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
		$username  = mysqli_real_escape_string($con, $_POST['username']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password1 = mysqli_real_escape_string($con, $_POST['password1']);
		$password2 = mysqli_real_escape_string($con, $_POST['password2']);
		
		//Ensure that form fields are filled properly
		if(empty($firstname)){
			array_push($errors, 'Your name is required'); //add error to errors array
		}
		
		if(empty($lastname)){
			array_push($errors, 'Your surname is required'); //add error to errors array
		}
		
		if(empty($password1)){
			array_push($errors, 'Password is required'); //add error to errors array
		}
		if(empty($username)){
			array_push($errors, 'User name is required'); //add error to errors array
		}
		
		if(empty($email)){
			array_push($errors, 'Email is required'); //add error to errors array
		}
		
		if(empty($password1)){
			array_push($errors, 'Password is required'); //add error to errors array
		}
		
		if($password1 != $password2){
			array_push($errors, 'Your two passwords do not match'); //add error to errors array
		}
		
		//If the are no errors, then save the user's information to database
		if(count($errors) == 0){
			$password = md5($password1); //Security encryption before storing password in the database
			$sql = "INSERT INTO members (firstname, surname, username, email, password) VALUES('$firstname', '$lastname', '$username', '$email', '$password')";
			
			mysqli_query($con, $sql);
			$_SESSION['username'] = $username;
			$_SESSION['positive'] = "You are now successifully registered";
			header('location: home.php');  //redirect to home page
		}
	}
	
	//Log user in from Login page
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		
		//Ensure that form fields are filled properly
		if(empty($username)){
			array_push($errors, 'User name is required'); //add error to errors array
		}
		
		if(empty($password)){
			array_push($errors, 'Password is required'); //add error to errors array
		}
		
		if(count($errors) == 0){
			$password = md5($password); //encryption before comparing with password from the database
			$query = "SELECT * FROM members WHERE username = '$username' AND password = '$password'";
			$result = mysqli_query($con, $query);
			if(mysqli_num_rows($result) == 1){
				//Log user in
				$_SESSION['username'] = $username;
				$_SESSION['positive'] = "You are now Logged in";
				header('location: home.php');  //redirect to home page
			}
			else{
				array_push($errors, 'Wrong username or password combination');
				header('location: login.php');
			}
		}
	}
	
	//Logout
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}

?>