<?php 
	include_once 'condb.php';
	include_once 'change_type_money.php'
 ?>

<?php

	if(isset($_POST['error'])){
		echo '<script> alert("Số lượng mua phải lớn hơn 0") </script>';
	}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping Dog</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
		<link rel="stylesheet" type="text/css" href="./css/index.css">
</head>
<body>

	<?php include 'header.php' ?>	
	
	<?php include 'carousel.php' ?>
	
	<?php include 'product.php' ?>

	<?php include 'footer.php' ?>					

<script src="./js/checkCount.js"></script>

</body>
</html>