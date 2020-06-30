

<!-- Xử lý đặt hàng khi khách hàng nhấn nút đặt hàng bao gồm :
    + insert khách hàng mới nếu khách hàng không đăng nhập sau đó insert vào bảng đăt hàng rồi tiếp tục insert vào chitietdathang
    + nếu khách hàng đã đăng nhập thì không cần insert khách hàng , chỉ insert dathang và chitietdathang
    + nếu khách hàng không đăng nhập mà số điện thoại đã có trong bảng khách hàng thì sẽ insert đặt hàng dựa trên 
    thông tin đã có trong bảng khách hàng
-->


<?php 
	include_once 'condb.php';
	include_once 'change_type_money.php'
 ?>

<?php
    $notify = '';

    session_start();
    if(isset($_SESSION['cart']) && (count($_SESSION['cart']) >= 1) && isset($_POST['insert_database'])){ // Nếu tồn tại cart va post insert
        if(isset($_SESSION['login'])){                              // kiểm tra người dùng có đăng nhập
            $MSKH = (int)processNameUser($_SESSION['login'][0]['id_user']);
            $totalamount = $_POST['totalamount']; // Tổng tiền
            $queryOrder = "insert into dathang values(null,'$MSKH',null,NOW(),$totalamount,'Chưa Xác Nhận')";
            $resultOrder = mysqli_query($conn,$queryOrder);
            $idOrderCurrent = mysqli_insert_id($conn); // id vừa mới insert
            $len = count($_SESSION['cart']);
            for($i = 0; $i < $len; $i++){
                $product_id = $_SESSION['cart'][$i]['product_id'];
                // $cartname   = $_SESSION['cart'][$i]['cartname'];
                $price_session = change_typeold_money($_SESSION['cart'][$i]['price_session']);
                $qty = $_SESSION['cart'][$i]['qty'];
                $queryDetails = "insert into chitietdathang values ('$idOrderCurrent','$product_id','$qty','$price_session')";
                $resultDetails = mysqli_query($conn,$queryDetails);
            }
            $notify = "Đặt hàng thành công <br>Họ tên:  ".processNameUser($_SESSION['login'][0]['fullname']).'<br> Số điện thoại: '.processNameUser($_SESSION['login'][0]['numberphone']).'<br> Địa chỉ: '.processNameUser($_SESSION['login'][0]['address']);
        }else{
            // nếu số điện thoại có trong cơ sở dữ liệu thì không cần thêm khách hàng mới
            // $numberphoneCheck = $_POST['insert_numberphone'];
            $fullname = $_POST['insert_name']; // dữ liệu người dùng nhập khi không đăng nhập
            $numberphone = $_POST['insert_numberphone'];
            $address = $_POST['insert_address'];
            if($fullname=='' || $fullname=='' || $address=='' || strlen($numberphone) != 10){
                $notify = "Thông tin khách hàng không được rỗng và số điện thoại phải đúng 10 số !";
            }else{
                $queryKH = "select * from khachhang where sodienthoai='$numberphone'";
                $resultCheck = mysqli_query($conn,$queryKH);
                if(mysqli_num_rows($resultCheck) > 0){
                    $row = mysqli_fetch_assoc($resultCheck);
                    $MSKH = $row['MSKH'];
                    $totalamount = $_POST['totalamount'];
                    $queryOrder = "insert into dathang values(null,'$MSKH',null,NOW(),$totalamount,'Chưa Xác Nhận')";
                    $resultOrder = mysqli_query($conn,$queryOrder);
                    $idOrderCurrent = mysqli_insert_id($conn); // id vừa mới insert
                    $len = count($_SESSION['cart']);
                    for($i = 0; $i < $len; $i++){
                        $product_id = $_SESSION['cart'][$i]['product_id'];
                        // $cartname   = $_SESSION['cart'][$i]['cartname'];
                        $price_session = change_typeold_money($_SESSION['cart'][$i]['price_session']);
                        $qty = $_SESSION['cart'][$i]['qty'];
                        $queryDetails = "insert into chitietdathang values ('$idOrderCurrent','$product_id','$qty','$price_session')";
                        $resultDetails = mysqli_query($conn,$queryDetails);
                    }
                    $notify = "Đặt hàng thành công với số điện thoại: ".$row['SoDienThoai'];
                }else{
                    $query = "insert into khachhang values(null,'$fullname','$address','$numberphone',null,null)";
                    $result = mysqli_query($conn,$query);
                    
                    $MSKHCurrent = mysqli_insert_id($conn);
                    $totalamount = $_POST['totalamount'];
                    $queryOrder = "insert into dathang values(null,'$MSKHCurrent',null,NOW(),$totalamount,'Chưa Xác Nhận')";
                    $resultOrder = mysqli_query($conn,$queryOrder);
                    $idOrderCurrent = mysqli_insert_id($conn); // id vừa mới insert
                    $len = count($_SESSION['cart']);
                    for($i = 0; $i < $len; $i++){
                        $product_id = $_SESSION['cart'][$i]['product_id'];
                        // $cartname   = $_SESSION['cart'][$i]['cartname'];
                        $price_session = change_typeold_money($_SESSION['cart'][$i]['price_session']);
                        $qty = $_SESSION['cart'][$i]['qty'];
                        $queryDetails = "insert into chitietdathang values ('$idOrderCurrent','$product_id','$qty','$price_session')";
                        $resultDetails = mysqli_query($conn,$queryDetails);
                    
                    } 
                    $notify = "Đặt hàng thành công với số điện thoại: ".$numberphone;
                }
            }
            
        }
    }else{
        $notify = 'Giỏ hàng rỗng';
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
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
</head>
<body>



    <div class="container" style="margin-top:100px; height:400px; ">
        <h1> <?php echo $notify; ?></h1>
        <a href="cart.php" class="btn btn-success">Quay về Giỏ hàng</a>
    </div>
    <div style="height:150px;"></div>
	<?php include 'footer.php' ?>					

</body>
</html>