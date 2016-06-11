<?php
require('core/init.php');
?>
<html>
<head>
	<title>Activate yout account</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="container">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>
		</ul>
		<h1>Acivate your account</h1>
		<?php
			if(isset($_GET['success'])===true && empty($_GET['success'])===true){
			?>
			<h3>Congratulations your account has been activated!</h3>	
			<?php
			}else if (isset($_GET['email'],$_GET['hash'])===true) {
				$email=trim($_GET['email']);
				$hash=trim($_GET['hash']);
				if(!$users->email_exists($email)){
					$errors[]='sorry we could not find that email address';

				}else if(!$users->activate($email,$hash)) {
					$errors[]='sorry we could not activate the account ';
				}
				if(!empty($errors)){
					echo '<p>'.implode('</p><p>', $errors) . '</p>';
				}else {
					header('Location: activate.php?success');
                	exit();
				}

			}else {
				header('Location: index.php');
            	exit();
			}

		?>

	</div>


</body>
</html>