<?php 


$config = array(
	'host' => 'localhost',
	'username'=>'u372998677_stud',
	'password'=> 'abhisekh96',
	'dbname'=>'u372998677_stud'
	);



try{
	$db=new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'],$config['username'],$config['password']);
	
}catch(PDOException $e) {  
	echo $e->getMessage();  
}  


?>