<?php

require 'core/init.php';
session_start();

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

        /* Sticky footer styles
        -------------------------------------------------- */
        html {
            position: relative;
            min-height: 100%;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            background-color: #333;
            padding-top: 20px;
        }

    </style>


    <title>Login and registration</title>
</head>
<body>

<nav class="navbar navbar-default">
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
                <li><a href="register.php">Register</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="jumbotron" style="margin-top: 20px">
        <h2>Welcome to Online Exam Portal!</h2><br>
        <h2>Click on register or login to proceed to exam portal.</h2>
        <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
    </div>
</div>

<footer class="footer" style="margin-top: 45px">
    <div class="container">
        <p class="text-muted" style="color: #ffffff;">Copyright &copy; <a href="http://riteshhota2008.github.io"
                                                                          style="color: gold">Ritesh Hota</a>. All
            Rights Reserved.</p>
    </div>
</footer>

<?php if (isset($_GET['emailsent']) && empty($_GET['emailsent'])) {
    echo '<h3 style="margin-left: 70px">Please check your email for password reset link.</h3>';
} ?>


<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


</body>
</html>