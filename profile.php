<?php
require 'core/init.php';
if (isset($_GET['successvalid']) && empty($_GET['successvalid'])) {
	echo 'Profile edit saved successfully';
}
if (isset($_GET['successpass']) && empty($_GET['successpass'])) {
	echo 'Password changed successfully';
}
session_start();
if($general->logged_in()){

	if(isset($_SESSION['user_name'])){
		$record=$users->userData($_SESSION['user_name']);
		?>
		<html>
		<head>
			<title>Profile</title>
			<link rel="stylesheet" type="text/css" href="css/style.css" >
		</head>
		<body>
			<div id="container">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="edit.php">edit</a></li>
					<li><a href="resetpass.php">Reset Password</a></li>
					<li><a href="logout.php">Logout</a></li>


				</ul>
				<table border="solid black">
					<tr>
						
						<td colspan="2"><img src=<?php echo $record['photo']?> height="200px" width="200px"></td>
					</tr>
					<tr>
						<td>First Name:</td>
						<td><?php echo $record['first_name']?></td>
					</tr>
					<tr>
						<td>Last Name:</td>
						<td><?php echo $record['last_name']?></td>
					</tr>
					<tr>
						<td>Birth Date:</td>
						<td><?php echo $record['birth']?></td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td><?php echo $record['gender']?></td>
					</tr>
				</table>

			</div>

		</body>
		</html>

		<?php
	}else{echo ":(";}
}else{ ?>
<h1>Please Login First</h1>
<?php }?>