
<?php 
	include_once 'condb.php';
 ?>


<?php 

    $hoten = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $numberphone = $_POST['numberphone'];

    $queryAddUser = "insert into khachhang values (null,'$hoten','$address','$numberphone','$username','$password')";
    $resultAddUser = mysqli_query($conn,$queryAddUser);
    echo    '<h1>Đăng ký thành công</h1>
            <a href="index.php" class="btn btn-success">Quay lại trang chủ</a>';
?>