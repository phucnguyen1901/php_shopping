
<!-- Khách hàng tra cứu đơn hàng -->


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



	<?php include 'header.php' ?>	
    <div class="container" style="margin-top:150px; height:400px; ">
        <form action="ordersearch.php" method="post">
            <input type="text" class="form-control mb-3 d-inline-block" style="width:500px;" name="sdt" placeholder="Nhập số điện thoại">
            <input type="submit" class="btn btn-success mb-1" value="Kiểm tra" name="checknumberphone">
        </form>

        <?php 
            
            
        ?>


        <?php 
            if(isset($_POST['checknumberphone'])){
                $numberphone = $_POST['sdt'];
                $sql = "select * from dathang INNER JOIN khachhang where dathang.MSKH = khachhang.MSKH and khachhang.SoDienThoai = '".$numberphone."'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    $checkrepeat = '';
                while ($row = mysqli_fetch_assoc($result)) {
                    if($checkrepeat != $row['HoTenKH']){
                        ?>
                        <div class="display-5">Họ tên khách hàng: <?php echo $row['HoTenKH'] ?></div>
                        <div class="display-5">Số điện thoại: <?php echo $row['SoDienThoai'] ?></div>
                        <div class="display-5">Địa chỉ: <?php echo $row['DiaChi'] ?></div>
                        <table class="table table-danger">
                            <tr>
                                <td><div class="display-5">Mã đơn hàng: <?php echo $row['SoDonDH'] ?></div></td>
                                <td><div class="display-5">Trạng thái đơn hàng : <?php echo $row['TrangThai'] ?></div></td>
                            </tr>
                        <?php
                    }else{
                        ?>
                            <tr>
                                <td><div class="display-5">Mã đơn hàng: <?php echo $row['SoDonDH'] ?></div></td>
                                <td><div class="display-5">Trạng thái đơn hàng : <?php echo $row['TrangThai'] ?></div></td>
                            </tr>
                        <?php
                    }
                ?>
                <?php

                    $checkrepeat = $row['HoTenKH']; 
                }
                echo '</table>';
            }else{
                // echo '<script> alert("Chưa nhập sđt")</script>';
                echo '<div>SĐT không có trong danh sách mua hàng</div>';
            }
        }
        ?>
    </div>
    

</body>
</html>