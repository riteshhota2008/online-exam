<?php 


$config = array(
	'host' => 'localhost',
	'username'=>'root',
	'password'=> 'pass',
	'dbname'=>'db'
	);



try{
	$db=new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'],$config['username'],$config['password']);
	
}catch(PDOException $e) {  
	echo $e->getMessage();  
}  


?>
