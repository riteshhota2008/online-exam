<?php 
require 'core/init.php';
session_start();
if (isset($_GET['successforgotpass']) && empty($_GET['successforgotpass'])) {
	echo 'Password saved successfully';
}
$general->logged_in_protect();
 
if (empty($_POST) === false) {
 
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
 
	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'Sorry, but we need your username and password.';
	} else if ($users->user_exists($username) === false) {
		$errors[] = 'Sorry that username doesn\'t exists.';
	} else if ($users->is_email_confirmed($username) === false) {
		$errors[] = 'Sorry, but you need to activate your account. 
					 Please check your email.';
	} else {
 
		$login = $users->login($username, $password);
		if ($login === false) {
			$errors[] = 'Sorry, that username/password is invalid';
		}else{
			session_start();
 			$_SESSION['user_name'] =  $login;
			header('Location: home.php');
			exit();
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en-us">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
	<!--	<link rel="stylesheet" type="text/css" href="css/style.css" > -->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >

    <style>

        body{
            background: url('images/GSC.png') no-repeat top center;
            background-size: 50%;
            background-position: 1% 30%;
            background-position-y: 50px;
        }

        @font-face{

        }

        .container {
            margin-left: 58%;
            width: 41%;
            margin-top: 40px;
            height: 569px;
            border-left: 1px solid #d6d6d6;
        }

        .container2{
            width: 80%;
            float: right;
            margin-top: 150px;
        }

        /*input{
            margin-top:8px;
        }*/


        h1{
            /*font-family: 'Segoe UI Light';*/
            font-weight: 200;
            font-style: normal;
            font-size: 2.15em;
        }

        .h1_pos{
            margin-top:-50px;
        }

        .about_pos {
            margin-top: 20px;
            margin-left: 220px;
        }

        .panel {
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
            -webkit-box-shadow: 0px -1px 20px 0px rgba(50, 50, 50, 0.48);
            -moz-box-shadow: 0px -1px 20px 0px rgba(50, 50, 50, 0.48);
            box-shadow: 0px -1px 20px 0px rgba(50, 50, 50, 0.48);
        }

    </style>



	<title>Login and registration</title>
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
				<!--<li><a href="register.php">Register</a></li>-->
				<!--<li class="dropdown">
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
				<li><a href="register.php">Sign up</a></li>
				<!--<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="profile.php">Profile</a></li>
						<li><a href="forgotpass.php">Forgot Password</a></li>
						<li><a href="logout.php">Log out</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="edit.php">Edit Profile</a></li>
					</ul>
				</li>-->
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>


<div class="container">
    <div class="container2" style="padding-right: 50px;">
        <div class="h1_pos">
            <h1>Login for Exam Portal!</h1>
        </div><br><br><br>
        <form method="post">
            <input type="text" class="form-control" name="username" placeholder="Username" title="Enter username here" /><br>
            <input type="password" class="form-control" name="password" placeholder="Password" title="Enter username here" /><br>
            <input type="checkbox" name="loggedin" value="true">&nbsp Keep me logged in<br>
            <div class="about_pos">
                <a href="forgotpass.php" style="text-decoration:none; color: silver;margin-left: 10px">Forgot password?</a>
            </div><br>
            <input type="submit" href="#" class="btn btn-default" name="btn_log" value="Sign in" style="float: right;"/>
        </form>
    </div>
</div>

<!--
<div class="container">
	<div class="jumbotron" style="margin-top: 20px">
		<h1>Welcome to Online Exam Portal!</h1><br>
		<!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
<!--	</div>
-->

 
		<?php if(empty($errors) === false){
 
			echo '<p>' . implode('</p><p>', $errors) . '</p>';			
 
		} 
		?>
<!--
		<form method="post" action="">
			<h4>Username:</h4>
			<input type="text" name="username">
			<h4>Password:</h4>
			<input type="password" name="password">
			<br>
			<input type="checkbox" name="loggedin" value="true">&nbsp Keep me logged in</br>
			<input type="submit" name="submit">
		</form>
</div>
-->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


</body>
</html>