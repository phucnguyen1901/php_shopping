<?php 
	include_once 'condb.php';
 ?>

 <?php

    // if(isset($_SESSION['login'])){
    //     session_start();
    //     header("Location: ./index.php");
    // }
    if(isset($_POST['login'])){
        if(isset($_SESSION['login'])){
            header("Location: ./index.php");
        }else{
            session_start();
            $username = $_POST['username'];
            $passwd = $_POST['passwd'];
            $queryUser = "select * from khachhang where username='$username' and passwd='$passwd'";
            $queryAdmin = "select * from nhanvien where username='$username' and passwd='$passwd'";
            $result = mysqli_query($conn,$queryUser);
            $resultAdmin = mysqli_query($conn,$queryAdmin);
            if(mysqli_num_rows($result) > 0){
                // echo '<script>alert("Thanh Cong"); </script>';
                // $count = count($_SESSION['login']);
                $row = mysqli_fetch_assoc($result);
                $item_arr = array(
                    'id_user' => "'".$row['MSKH']."'",
                    'username' => "'".$row['username']."'",
                    'fullname' => "'".$row['HoTenKH']."'",
                    'address' => "'".$row['DiaChi']."'",
                    'numberphone' => "'".$row['SoDienThoai']."'"
                );
                $_SESSION['login'][0] = $item_arr;
                header("Location: ./cart.php");
                // print_r( $_SESSION['login']);
                // session_destroy();
 
            }else if(mysqli_num_rows($resultAdmin) > 0){
                $row = mysqli_fetch_assoc($resultAdmin);
                $item_arr2 = array(
                    'id_admin' => "'".$row['MSNV']."'",
                    'username' => "'".$row['username']."'",
                    'fullname' => "'".$row['HoTenNV']."'",
                );
                $_SESSION['login_admin'][0] = $item_arr2;
                header("Location: ./admin.php");
            }else{
                echo '<script>alert("That Bai"); </script>';
            }
        }

    }

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
</head>
<body>
    <?php include 'header.php' ?>

    <?php
            if(isset($_SESSION['login'])){
                echo '<script>alert("Ban da dang nhap roi"); </script>';
                echo '<h2 style="margin-top:300px; text-align:center;"><a href="index.php" class="btn btn-success">Quay lại trang chủ ngay</a></h2>';
            }else{
    ?>
            <div class="container" style="margin-top:100px; width:400px;">
                <form action="" method="POST">
                    <label for="">Tên đăng nhập</label> 
                    <input type="text" class="form-control" name="username">
                    <br>
                    <label for="">Mật khẩu</label> 
                    <input type="password" class="form-control" name="passwd">
                    <br>
                    <input type="submit" value="Đăng nhập" class="btn btn-success" name="login">
                </form>
            </div>
        <?php
        }
        ?>

        <div  id='error'></div>
    <!-- <script src="js/cart.js"></script> -->
    <script src="js/checkFormNvLogin.js"></script>

</body>
</html>