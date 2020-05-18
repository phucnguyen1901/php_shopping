<?php 
	include_once 'condb.php';
	include_once 'change_type_money.php'
 ?>


<?php
    session_start();
    if(isset($_SESSION['cart']) && isset($_POST['insert_database'])){ // Neu ton tai cart va post insert
        if(isset($_SESSION['login'])){                              // kiểm tra người dùng có đăng nhập
            $MSKH = (int)processNameUser($_SESSION['login'][0]['id_user']);
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
                echo "Thành công";
            }
        }else{
            // nếu số điện thoại có trong cơ sở dữ liệu
            $numberphoneCheck = $_POST['insert_numberphone'];
            $queryKH = "select * from khachhang where sodienthoai='$numberphoneCheck'";
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
                    echo "Thành công";
                }
            }else{
                $fullname = $_POST['insert_name']; // dữ liệu người dùng nhập khi không đăng nhập
                $numberphone = $_POST['insert_numberphone'];
                $address = $_POST['insert_address'];
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
                    echo "Thành công";
                }
            }

        }

    }else{
        echo 'No exist';
    }
?>
















