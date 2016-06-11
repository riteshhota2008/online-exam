<?php 
require('core/init.php');
if (isset($_POST['submit'])) {

	if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])||empty($_POST['confirm_password'])){

		$errors[] = 'All fields are required.';

	}else{

        
		if ($users->user_exists($_POST['username']) === true) {
		 	$errors[] = 'That username already exists';
		}
		if (!preg_match("/[a-zA-Z0-9-_]+/",$_POST['username'])){
			$errors[] = 'The user name should be alphanumeric characters with some special symbols (-,_).';
		}
		if (strlen($_POST['password']) <6){
			$errors[] = 'Your password must be at least 6 characters';
		} else if (strlen($_POST['password']) >12){
			$errors[] = 'Your password cannot be more than 12 characters long';
		}
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'Please enter a valid email address';
		}else if ($users->email_exists($_POST['email']) === true) {
		 	$errors[] = 'That email already exists.';
		}
		
		if($_POST['password']!=$_POST['confirm_password']){
			$errors[]='passwords don\'t match';
		}
		if ($_POST['tc']!="1"){
			$errors[]='Please accept the terms and condition';
		}


	}

	if(empty($errors) === true){
		
		$username 	= htmlentities($_POST['username']);
		$password 	= $_POST['password'];
		$email 		= htmlentities($_POST['email']);

		$users->register($username, $password, $email);
		header('Location: register.php?success');
		exit();
	}
}

if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Thank you for registering. Please check your email.';
}
?>

<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<title>Register</title>
</head>
<body>	
	<div id="container">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>
		</ul>
		<h1>Register</h1>

		<form method="post" action="">
			<h4>Username:</h4>
			<input type="text" name="username" />
			<h4>Email:</h4>
			<input type="text" name="email" />	
			<h4>Password:</h4>
			<input type="password" name="password" />
			<h4>Confirm Password:</h4>
			<input type="password" name="confirm_password" />
			<h4>Terms & Condition:</h4>
			<input type="checkbox" name="tc" value="1" />"I agree terms and condition"	
			

			<br>
			<input type="submit" name="submit" />
		</form>


		<?php 
		
		if(empty($errors) === false){
			echo '<p>' . implode('</p><p>', $errors) . '</p>';
		}

		?>

	</div>
</body>
</html>
