<?php
require 'core/init.php';
session_start();

if($general->logged_in()){

if(isset($_SESSION['user_name'])){
$record=$users->userData($_SESSION['user_name']);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

  <!-- Compiled and minified CSS -->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
</head>
<body>

<div id="container">
    <ul>
        <li><a href="logout.php">Logout</a></li>


    </ul>
</div>


<div class="row">
    <form class="col s12" action="question_check.php" method="post">
     	<div class="row">
       		<div class="input-field col s6">
        		<input placeholder="Placeholder" id="question_1" name="question_1" type="text" class="validate">
          			<label for="question_1"></label>
    		</div>
      	</div>
      	<button class="btn waves-effect waves-light" type="submit" name="submit">Submit
    <i class="material-icons right">send</i>
  </button>
    </form>
</div>

</body>
</html>

    <?php
}else{echo ":(";}
}else{ ?>
    <h1>Please Login First</h1>
<?php }?>