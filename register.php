

<!-- Trang đăng ký khách hàng -->


<?php 
	include_once 'condb.php';
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
	<link rel="stylesheet" type="text/css" href="./css/home.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <style>
        .container{
            font-size:15px;
        }
        .form-control{
            height: 30px;
        }
    </style>
</head>
<body>
    <?php include 'header.php' ?>	
        <div class="container mb-3" style="margin-top:100px; width:350px;">
        <form action="handlingAddUser.php" method="POST" id="formRegister" onsubmit="return save()">
            <label for="">Họ tên khách hàng</label> 
            <input type="text" class="form-control" name="fullname">
            <span id="errorfullname"></span>
            <br>
            <label for="">Tên đăng nhập</label> 
            <input type="text" class="form-control" name="username" id="username">
            <span id="errorusername"></span>
            <br>
            <br>
            <label for="">Mật khẩu</label> 
            <input type="password" class="form-control" name="password" id="password">
            <br>
            <br>
            <label for="">Nhập lại mật khẩu</label> 
            <input type="password" class="form-control" name="repeatpassword" id="repeatpassword">
            <span id="errorrepeatpassword"></span>
            <br>
            <br>
            <label for="">Địa chỉ</label> 
            <input type="text" class="form-control" name="address">
            <br>
            <br>
            <label for="">Số điện thoại</label> 
            <input type="text" class="form-control" name="numberphone" id="numberphone">
            <span id="errornumberphone"></span>
            <br>
            <br>    
            <button type="submit" value="Đăng ký" class="btn btn-success" name="register">Đăng ký</button>
        </form>
        </div>
        <div  id='error'></div>
        <!-- <div style="height:520px; color:red"></div> -->
    <script src="js/checkRegister.js"></script>
</body>
</html>






