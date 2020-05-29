<?php 
	include_once 'condb.php';
	include_once 'change_type_money.php'
 ?>


 <?php
    session_start();
    if(isset($_POST['confirm']) && isset($_SESSION['login_admin'])){
        $choose = $_POST['choose_status'];
        $SodonDH = (int)$_POST['SodonDH'];
        $MSNV = processNameUser($_SESSION['login_admin'][0]['id_admin']);
        $queryUpdateStatus = "update dathang set TrangThai='$choose',MSNV=$MSNV where SoDonDH=$SodonDH";
        $resultUpdateStatus = mysqli_query($conn,$queryUpdateStatus);
        if($resultUpdateStatus){
            echo 'thanh cong';
        }else{
            echo 'khong thanh cong';
        }
        // echo gettype($SodonDH);
        header("Location: ./admin.php");
    }else{
        echo 'Xác nhận không thành công';
        echo '<a href="admin.php">Quay lại</a>';
    }

 ?>






