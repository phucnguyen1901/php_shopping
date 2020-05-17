<?php 
	
	$servername = "localhost:3307";
	$username   = "root";
	$password	= "";
	$database   = "shoppingdog";

	$conn = mysqli_connect($servername,$username,$password,$database);

	if(!$conn){
		die('Connect Failed');
	}

 ?>
