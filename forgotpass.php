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
	<link rel="stylesheet" type="text/css" href="css/style.css" >
</head>
<body>
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

</body>
</html>