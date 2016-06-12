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
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<title>Home</title>
</head>
<body>


<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Ritesh</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
				<!--<li><a href="register.php">Register</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>-->
			</ul>
			<!--<form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>-->
			<ul class="nav navbar-nav navbar-right">
				<!--<li><a href="login.php">Login</a></li>-->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="profile.php">Profile</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="logout.php">Log out</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<div class="container">
	<div class="jumbotron" style="margin-top: 20px">
		<h1>Change Password!</h1><br>
		<form method="post" action="">
			<input type="password" name="old_password" placeholder="Old password"><br>
			<input type="password" name="new_password" placeholder="New password"><br>
			<input type="password" name="re_password" placeholder="Confirm password"><br>
			<input type="submit" name="submit">
        </form>
		<!--<p><a class="btn btn-primary btn-lg" href="profile.php" role="button">Profile</a></p>-->
	</div>
</div>
<!--
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
-->
</body>
</html>
<?php 
}else{
	echo 'please login first';
}
?>