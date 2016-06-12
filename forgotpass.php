<?php
require 'core/init.php';
if(isset($_POST['submit'])){
	if(empty($_POST['user_name'])){
		$errors_new="please enter user_name";
	}
	if(empty($errors_new) === true){
		$users->sendPassResetMail($_POST['user_name']);
		header('Location: index.php?emailsent');
		exit();
	}


}
?>
<html>
<head>
	<title>Forgot Password</title>
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
				<li><a href="login.php">Log in</a></li>
                <li><a href="login.php">Register</a></li>
				<!--<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="profile.php">Profile</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="logout.php">Log out</a></li>
					</ul>
				</li>-->
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<div class="container">
	<div class="jumbotron" style="margin-top: 20px">
		<h1>Forgot Password!</h1><br>
        <h2 style="color: #696969">Please enter your username</h2><br>
		<form method="post" action="" style="width: 30%">
			<input type="password" class="form-control" name="user_name" placeholder="Username"><br>
			<input type="submit" href="#" class="btn btn-default" name="submit" style="float: right;">
		</form>
		<!--<p><a class="btn btn-primary btn-lg" href="profile.php" role="button">Profile</a></p>-->
	</div>
</div>
<!--
	<div id="container">
		
		<form method="post" action="">
			<table align="center">
				<th><h1>Forgot Password</h1></th>
				<tr>
				<?php if(empty($errors_new) === false){
					echo '<td>'.implode('</td><td>', $errors_new) . '</td>';
				}?></tr>
				<tr><td>Please enter your user name:</td></tr>
				<tr><td><input type="text" name="user_name"></td></tr>
				<tr><td><input type="submit" name="submit"></td></tr>
			</tr>
		</table>
	</form>
-->


<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>