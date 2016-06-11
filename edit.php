<?php
require 'core/init.php';
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
					<li><a href="logout.php">Logout</a></li>


				</ul>


				<form action="validate.php" method="post" enctype="multipart/form-data">
					<table border="solid black">
						<tr>
							<td>First Name:</td>
							<td><input type='text' name='first_name' value=<?php echo $record['first_name']?> ></td>
						</tr>
						<tr>
							<td>Last Name:</td>
							<td><input type='text' name='last_name' value=<?php echo $record['last_name']?> ></td>
						</tr>
						<tr>
							<td>Birth Date:</td>
							<td><input type='text' name='birth'value=<?php echo $record['birth']?> ></td>
						</tr>
						<tr>
							<td>Gender:</td>
							<td><input type='text' name='gender' value=<?php echo $record['gender']?> ></td>
						</tr>
						<tr>
							<td>Photo:</td>
							<td><input type="file" name="file"></td>
						</tr>
						<tr>
							<td><input type="submit" name='submit'></td>
						</tr>

					</table>
				</form>
			</div>

		</body>
		</html>

		
		<?php
	}else{echo ":(";}
}else{ ?>
<h1>Please Login First</h1>
<?php }?>