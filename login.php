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
        } else {
            session_start();
            $_SESSION['user_name'] = $login;
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet">
    <style>
        h1, h2, h3, h4, h5, h6, p, a, li, ul, label, input, span {
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 400;
        }

        /* Box Card Design */
        .box-material {
            padding: 30px;
            background-color: white;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.04);
            border-radius: 5px;
            border: 1px solid #e5e5e5;
        }
    </style>

    <title>Login and registration</title>
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
                <li><a href="register.php">Sign Up</a></li>
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
                    <h2 class="text-center">Login.</h2>
                    <form method="post">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="username" placeholder="Username"
                                   title="Enter username here"/><br>
                        </div>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                   title="Enter password here"/><br>
                        </div>
                        <div class="col-sm-12">
                            <input type="checkbox" name="loggedin" value="true"><label>&nbsp; Keep me logged in.</label><br>
                        </div>
                        <div class="col-sm-12">
                            <a href="forgotpass.php" class="pull-right"
                               style="text-decoration:none; color: silver;margin-left: 10px;">Forgot
                                password?</a><br>
                        </div>
                        <div class="col-sm-12" style="margin-top: 10px">
                            <input type="submit" href="#" class="btn btn-primary btn-block" name="btn_log"
                                   value="Sign in"/><br>
                        </div>
                        <div class="col-sm-12">
                            <a class="pull-right" href="register.php">Not Registered? Sign Up.</a><br/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php if (empty($errors) === false) {

    echo '<p>' . implode('</p><p>', $errors) . '</p>';

}
?>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>