
<!-- Kết nối database -->

<?php 
	
	$servername = "localhost:3307"; // Máy em port 3307 , máy thầy port 3306 thì sửa lại dùm em
	$username   = "root";
	$password	= "";
	$database   = "shoppingdog";

	$conn = mysqli_connect($servername,$username,$password,$database);

	if(!$conn){
		die('Connect Failed');
	}

 ?>
