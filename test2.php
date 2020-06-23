<?php 
	include_once 'condb.php';
	include_once 'change_type_money.php'
 ?>


<?php 
include_once 'condb.php';
include_once 'change_type_money.php'
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


<?php include 'product.php' ?>

        <form action="#" name="formAddProduct" method="POST" onsubmit="return save()">
        <img src="<?php echo 'img/'.$row['Hinh'];?>" alt="" style="width: 300px; height: 200px;" class="img-fluid rounded-circle">
        <h3><?php echo $row['TenHH'];?></h3>
        <h5 class="text-warning"><?php echo change_type_money($row['Gia']);?></h5>
        <input type="text" class="form-control mb-3 d-inline-block" style="width:100px;" id="count" name="qty" value="1">
        <input type="hidden" class="form-control mb-3 d-inline-block" style="width:100px;" name="price" value="<?php echo change_type_money($row['Gia']);?>">
        <input type="hidden" class="form-control mb-3 d-inline-block" style="width:100px;" name="namecart" value="<?php echo $row['TenHH'];?> ">
        <input type="hidden" class="form-control mb-3 d-inline-block" style="width:100px;" name="id_product" value="<?php echo $row['MSHH'];?> ">
        <button type="submit" name="add" class="btn btn-success mb-1">Mua Ngay</button>
        <!-- <button class="btn btn-warning ">Thêm vào giỏ hàng</button> -->
    </form>


<script src="./js/checkCount.js"></script>

</body>
</html>













