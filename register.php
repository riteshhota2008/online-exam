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
			margin-top: 200px;
			margin-left: 180px;
		}

		.panel {
			-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
			box-shadow: 0 1px 2px rgba(0,0,0,.05);
			-webkit-box-shadow: 0px -1px 20px 0px rgba(50, 50, 50, 0.48);
			-moz-box-shadow: 0px -1px 20px 0px rgba(50, 50, 50, 0.48);
			box-shadow: 0px -1px 20px 0px rgba(50, 50, 50, 0.48);
		}

	</style>

	<title>Register</title>
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
                <li><a href="login.php">Login</a></li>
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
            <h1>Register for Exam Portal!</h1>
        </div><br><br><br>
        <form method="post" action="">
            <input type="text" class="form-control" name="username" placeholder="Username" title="Enter username here" /><br>
            <input type="email" class="form-control" name="email" placeholder="Email" title="Enter email here" /><br>
            <input type="password" class="form-control" name="password" placeholder="Password" title="Enter password here" /><br>
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" title="Enter password again" /><br>
            <input type="checkbox" class="form-control" name="tc" value="1" />"I agree terms and condition"
            <input type="submit" class="btn btn-default" name="submit" value="Sign up" style="float: right;"/>
            <div class="about_pos">
                <!-- <a href="AboutManagement.php" style="text-decoration:none; color: silver">About management</a> -->
            </div>
        </form>
    </div>
</div>

<!--	<div id="container">
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
-->

		<?php 
		
		if(empty($errors) === false){
			echo '<p>' . implode('</p><p>', $errors) . '</p>';
		}

		?>
<!--
	</div>

-->

	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

</body>
</html>
