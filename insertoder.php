

<!-- Thêm vào bảng khách hàng xong rồi thêm vào bảng dathang , rồi thêm vào bảng chi tiết chitietdathang -->

<?php 
	include_once 'condb.php';
    include_once 'change_type_money.php'
    
    if(isset($_POST['order'])){
        $insertKH = "insert into khachhang values(null,'".$_POST['Hoten']."','".$_POST['diachi']."','".$_POST['sodienthoai']."')";
        $insertDH = "insert into dathang values(null,".$_POST['Masokhachhang'].",null,NOW(),'".$_POST['trangthai']."',".$_POST['tonggia'].")";

        

        $insertCTDH = "insert into chitietdathang values(null,'".$_POST['masohanghoa']."','".$_POST['Soluong']."','".$_POST['Giadathang']."')";

        mysqli_query($conn,$insertKH);
        mysqli_query($conn,$insertDH);
        mysqli_query($conn,$insertCTDH);
    }


 ?>

