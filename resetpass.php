<?php
require 'core/init.php';
session_start();
if(isset($_SESSION['user_name'])){
	
	if (isset($_POST['submit'])) {
		
		if(empty($_POST['old_password']) || empty($_POST['new_password']) || empty($_POST['re_password'])){

			$errors_new[] = 'All fields are required.';
		}else{
			if (strlen($_POST['new_password']) <6){
				$errors_new[] = 'Your password must be at least 6 characters';
			} else if (strlen($_POST['new_password']) >12){
				$errors_new[] = 'Your password cannot be more than 12 characters long';
			}
			if($_POST['new_password']!=$_POST['re_password']){
				$errors_new[]='new passwords don\'t match';
			}



		}

		if(empty($errors_new) === true){
			if($users->resetPassword($_SESSION['user_name'],$_POST['old_password'],$_POST['new_password'])===true){
				header('Location: profile.php?successpass');
				exit();
			}else{
				$errors_new[]="Old Password not correct";
			}
		}
		

	}
}

if($general->logged_in()){?>
<html>
<head>
	<title>Reset Password</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" >
</head>
<body>
	<div id="container">
		
		<form method="post" action="">
			<table align="center">
				<th><h1>Reset Password</h1></th>
				<tr>
				<?php if(empty($errors_new) === false){
					echo '<td>'.implode('</td><td>', $errors_new) . '</td>';
				}?></tr>
				<tr><td>Older Password:</td></tr>
				<tr><td><input type="password" name="old_password"></td></tr>
				<tr><td>New Password:</td></tr>
				<tr><td><input type="password" name="new_password"></td></tr>
				<tr><td>Re-enter New Password:</td></tr>
				<tr><td><tr><td><input type="password" name="re_password"></td><tr></td></tr>
				<tr><td><input type="submit" name="submit"></td></tr>
			</tr>
		</table>
	</form>

</body>
</html>
<?php 
}else{
	echo 'please login first';
}
?>