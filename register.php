<?php
require('core/init.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['confirm_password'])) {

        $errors[] = 'All fields are required.';

    } else {

        $username = $email = '';
        $userErr = $usernameErr = $passErr = $cpassErr = $valid_emailErr = $emailErr = $tc = $success = '';
        $error = 0;

        $username = ((isset($_POST["username"])) ? $_POST["username"] : " ");
        $email = ((isset($_POST["email"])) ? $_POST["email"] : " ");

        if ($users->user_exists($_POST['username']) === true) {
            //$errors[] = 'That username already exists';
            $userErr = 'That username already exists.';
            $error = 1;
        }

        if (!preg_match("/[a-zA-Z0-9-_]+/", $_POST['username'])) {
            $usernameErr = 'The username should be at least 8 alphanumeric characters. Only this special symbols (-,_) allowed.';
            $error = 1;
            
        } else if (strlen($_POST['username']) < 8) {
            //$errors[] = 'The user name should be alphanumeric characters with some special symbols (-,_).';
            $usernameErr = 'The username should be at least 8 alphanumeric characters. Only this special symbols (-,_) allowed.';
            $error = 1;
        }

        if (strlen($_POST['password']) < 8) {
            //$errors[] = 'Your password must be at least 6 characters';
            $passErr = 'Your password must be at least 8 characters.';
            $error = 1;
        } /*else if (strlen($_POST['password']) > 12) {
            $errors[] = 'Your password cannot be more than 12 characters long';
        }*/

        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            //$errors[] = 'Please enter a valid email address';
            $valid_emailErr = 'Please enter a valid email address.';
            $error = 1;
        } else if ($users->email_exists($_POST['email']) === true) {
            //$errors[] = 'That email already exists.';
            $emailErr = 'That email already exists.';
            $error = 1;
        }

        if ($_POST['password'] != $_POST['confirm_password']) {
            //$errors[] = 'passwords don\'t match';
            $cpassErr = 'Passwords don\'t match.';
            $error = 1;
        }

        if ($_POST['tc'] != "1") {
            //$errors[] = 'Please accept the terms and condition';
            $tc = 'Please accept the terms and conditions.';
            $error = 1;
        }

    }

    if ($error == 0) {

        $username = htmlentities($_POST['username']);
        $password = $_POST['password'];
        $email = htmlentities($_POST['email']);

        $users->register($username, $password, $email);
        header('Location: register.php?success');
        exit();
    }
}

if (isset($_GET['success']) && empty($_GET['success'])) {
    //echo 'Thank you for registering. Please check your email.';
    $success = '<div class="alert alert-success">Thank you for registering. Please check your email.</div>';
}
?>

<html>
<head>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">
    <style>
        h1, h2, h3, h4, h5, h6, p, a, li, ul, label, input, span {
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 400;
        }
    </style>

    <title>Register</title>
</head>
<body style="background-color: #f9f9f9">


<nav class="navbar navbar-inverse" style="border-radius: 0px">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Exam Portal</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php">Login</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container" style="margin-top: 30px">
    <h2 class="text-center">Online Exam Portal</h2><br>
    <div class="row">
        <div class="col-xs-12 col-sm-offset-4 col-sm-4 col-sm-offset-4">
            <div class="box-material">
                <div class="row">
                    <div class="text-center">
                        <?php echo $success; ?>
                    </div>
                    <h2 class="text-center">Registration.</h2>
                    <form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="username"
                                   title="Enter username here" required <?php if (isset($_POST["username"])) {
                                echo 'value="' . $username . '"';
                            } else {
                                echo "placeholder='Username'";
                            } ?>/>
                            <span class="text-error"><small><?php echo $userErr ?><?php echo $usernameErr ?></small></span><br/>
                        </div>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" name="email"
                                   title="Enter email here" required <?php if (isset($_POST["email"])) {
                                echo 'value="' . $email . '"';
                            } else {
                                echo "placeholder='Email'";
                            } ?>/>
                            <span class="text-error"><small><?php echo $emailErr ?><?php echo $valid_emailErr ?></small></span><br/>
                        </div>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                   title="Enter password here" required/>
                            <span class="text-error"><small><?php echo $passErr ?><?php echo $cpassErr ?></small></span><br/>
                        </div>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="confirm_password"
                                   placeholder="Confirm Password"
                                   title="Enter password again" required/><br>
                        </div>
                        <div class="col-sm-12">
                            <input type="checkbox" name="tc" value="1"/><label>&nbsp;&nbsp;"I agree to the Terms and
                                Conditions."</label><br/>
                            <span class="text-error"><small><?php echo $tc ?></small></span><br/><br/>
                        </div>
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-success btn-block" name="submit" value="Sign up"/><br>
                        </div>
                        <div class="col-sm-12">
                            <a class="pull-right" href="login.php">Already Registered? Log In.</a><br/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<?php

if (empty($errors) === false) {
    echo '<p>' . implode('</p><p>', $errors) . '</p>';
}

?>-->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>
