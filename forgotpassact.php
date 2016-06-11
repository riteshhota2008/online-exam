<?php
require 'core/init.php';
if (isset($_GET['email'],$_GET['hash'])===true) {
	$hash=trim($_GET['hash']);
	$email=trim($_GET['email']);
}
if(isset($_POST['submit'])){

	if(empty($_POST['new_password']) && empty($_POST['re_password'])){
		$errors[]='all the fields are rquired';
	}
	if (strlen($_POST['new_password']) <6){
		$errors[] = 'Your password must be at least 6 characters';
	} else if (strlen($_POST['new_password']) >12){
		$errors[] = 'Your password cannot be more than 12 characters long';
	}
	if($_POST['new_password']!=$_POST['re_password']){
		$errors[]='new passwords don\'t match';
	}
	if(empty($errors)) {
		$users->resetForgotPass($email,$hash,$_POST['new_password']);
		header('Location: login.php?successforgotpass');
		exit();
	}

}



?>
<html>
<head>
	<title>Rese</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="container">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>
		</ul>
		<h1>Password Reset</h1>
		<?php if(!empty($errors)) {
			echo '<p>'.implode('</p><p>', $errors) . '</p>';
		}	?>
		<form method ="post" action="#">
			<table>
				<tr><td>Enter New Password:</td></tr>
				<tr><td><input type="password" name="new_password"></td></tr>
				<tr><td>Re-enter New Password:</td></tr>
				<tr><td><input type="password" name="re_password"></td></tr>
				<tr><td><input type="submit" name="submit"></td></tr>
			</table>
		</form>



	</div>


</body>
</html>

