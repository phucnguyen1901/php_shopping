<?php 
    include_once 'condb.php';
    include_once 'change_type_money.php'
 ?>

<?php
    session_start();
    if(!isset($_POST['login'])){
        if(!isset($_SESSION['login_admin'])){
            header("Location: ./login.php");
        }
    }

    if(isset($_POST["out_admin"])){
		session_destroy();
		header("Location: ./login.php");
	}
    
?>

    
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="manage.css">
    <title>Quản lí</title>
</head>
<body>

    <div class="container mb-3">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand" href="admin.php">
                <img src="img/logo.jpg" alt="logo" style="width: 100px; height: 50px;">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link text-primary" href="admin.php">Đơn hàng <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="infoCustomers.php">Khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="infoEmployee.php">Nhân viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="statistical.php">Thống kê</a>
                    </li>
                </ul>
                    <?php if(isset($_SESSION['login_admin'])){?>
                        <span style="font-size:15px;" class="mr-3 text-primary"><?php echo 'Xin Chào, '.processNameUser($_SESSION['login_admin'][0]['fullname'])?></span>
                        <form action="" method="post">
                            <button type="submit" name="out_admin" class="btn btn-outline-warning text-primary">Đăng Xuất</button>
                        </form>
                    <?php }?>
        </nav>
    </div>