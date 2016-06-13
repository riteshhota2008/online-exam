
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
			<!--<link rel="stylesheet" type="text/css" href="css/style.css" >-->

            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="css/bootstrap.min.css" >

            <style>


                .login-page {
                    width: 360px;
                    padding: 8% 0 0;
                    margin: auto;
                }
                .form {
                    position: relative;
                    z-index: 1;
                    background: #FFFFFF;
                    max-width: 360px;
                    margin: 0 auto 100px;
                    padding: 45px;
                    text-align: center;
                    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
                }
                .form input {
                    font-family: "Roboto", sans-serif;
                    outline: 0;
                    background: #f2f2f2;
                    width: 100%;
                    border: 0;
                    margin: 0 0 15px;
                    padding: 15px;
                    box-sizing: border-box;
                    font-size: 14px;
                }
                .form button {
                    font-family: "Roboto", sans-serif;
                    text-transform: uppercase;
                    outline: 0;
                    background: #4CAF50;
                    width: 100%;
                    border: 0;
                    padding: 15px;
                    color: #FFFFFF;
                    font-size: 14px;
                    -webkit-transition: all 0.3 ease;
                    transition: all 0.3 ease;
                    cursor: pointer;
                }
                .form button:hover,.form button:active,.form button:focus {
                    background: #43A047;
                }
                .form .message {
                    margin: 15px 0 0;
                    color: #b3b3b3;
                    font-size: 12px;
                }
                .form .message a {
                    color: #4CAF50;
                    text-decoration: none;
                }
                .form .register-form {
                    display: none;
                }
                .container {
                    position: relative;
                    z-index: 1;
                    max-width: 300px;
                    margin: 0 auto;
                }
                .container:before, .container:after {
                    content: "";
                    display: block;
                    clear: both;
                }
                .container .info {
                    margin: 50px auto;
                    text-align: center;
                }
                .container .info h1 {
                    margin: 0 0 15px;
                    padding: 0;
                    font-size: 36px;
                    font-weight: 300;
                    color: #1a1a1a;
                }
                .container .info span {
                    color: #4d4d4d;
                    font-size: 12px;
                }
                .container .info span a {
                    color: #000000;
                    text-decoration: none;
                }
                .container .info span .fa {
                    color: #EF3B3A;
                }
                body {
                    /*background: #76b852; /* fallback for old browsers */
                    /*background: -webkit-linear-gradient(right, #76b852, #8DC26F);
                    background: -moz-linear-gradient(right, #76b852, #8DC26F);
                    background: -o-linear-gradient(right, #76b852, #8DC26F);
                    background: linear-gradient(to left, #76b852, #8DC26F);*/
                    font-family: "Roboto", sans-serif;
                    -webkit-font-smoothing: antialiased;
                    -moz-osx-font-smoothing: grayscale;
                }
                form textarea {
                    font-family: "Roboto", sans-serif;
                    outline: 0;
                    background: #f2f2f2;
                    width: 100%;
                    border: 0;
                    margin: 0 0 15px;
                    padding: 15px;
                    box-sizing: border-box;
                    font-size: 14px;
                }
                button a:hover {
                    text-decoration: none;
                }

            </style>

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
                       <!-- <li><a href="register.php">Register</a></li>
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
                        </li> -->
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
                                <li><a href="resetpass.php">Change Password</a></li>
                                <li><a href="logout.php">Log out</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="questions.php">Exam Portal</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

<!--			<div id="container">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="edit.php">edit</a></li>
					<li><a href="resetpass.php">Reset Password</a></li>
					<li><a href="logout.php">Logout</a></li>
					<li><a href="test.php">Exam Portal</a></li>
                    <li><a href="questions.php">New Exam Portal</a></li>


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
-->
            <div class="login-page" style="margin-top: -70px">
                <div class="form">
                    <form class="register-form" method="post" action="validate.php">
                        <input type="text" placeholder="name"/>
                        <input type="password" placeholder="password"/>
                        <input type="text" placeholder="email address"/>
                        <button>create</button>
                        <p class="message">Already registered? <a href="#">Sign In</a></p>
                    </form>
                    <form class="login-form" method="post" action="validate.php" enctype="multipart/form-data">
                        <input type="text" name="first_name" placeholder="First Name"/>
                        <input type="text" name="last_name" placeholder="Last Name"/>
                        <input type="text" name="department" placeholder="Department"/>
                        <input type="text" name="year" placeholder="Year"/>
                       <!-- <input type="email" name="email" placeholder="Email"/> -->
                        <input type="number" name="mobile_no" placeholder="Contact No."/>
                        <textarea name="info" cols="40" rows="3" placeholder="Write something about yourself in 50 words!" maxlength="100"></textarea>
                        <label>Upload your Profile Picture</label><br><br>
                        <input type="file" name="profile_pic">
                        <input type="submit" name="submit" class="btn btn-default" value="Submit"><span style="color: #FFFFFF">Submit</span><!--</input>-->
                    </form>
                </div>
            </div>


            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>



		</body>
		</html>


<?php
}else{echo ":(";}
}else{ ?>
    <h1>Please Login First</h1>
<?php }?>