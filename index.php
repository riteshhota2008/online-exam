<?php 

require 'core/init.php';
session_start();


?>


<head>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<title>Login and registration</title>
</head>
<body>	
	<div id="container">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>
		</ul>
		<h1>Welcome to Ashish's site!</h1>
		<?php if (isset($_GET['emailsent']) && empty($_GET['emailsent'])) {
			echo '<h3>Please check your email for password reset link</h3>';
		}?>
	</div>
</body>
</html>