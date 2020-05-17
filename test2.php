<?php 
	include_once 'condb.php';
	include_once 'change_type_money.php'
 ?>


<?php
    session_start();
    if(isset($_SESSION['cart']) && isset($_POST['insert_database'])){
        if(isset($_SESSION['login'])){
            $msnv = (int)processNameUser($_SESSION['login'][0]['id_user']);
            $queryOrder = "insert into dathang values(null,'$msnv',null,NOW(),'Chưa Xác Nhận')";
            $resultOrder = mysqli_query($conn,$queryOrder);
            $idOrderCurrent = mysqli_insert_id($conn);
            $len = count($_SESSION['cart']);
            for($i = 0; $i < $len; $i++){
                $product_id = $_SESSION['cart'][$i]['product_id'];
                // $cartname   = $_SESSION['cart'][$i]['cartname'];
                $price_session = $_SESSION['cart'][$i]['price_session'];
                $qty = $_SESSION['cart'][$i]['qty'];
                
                $queryDetails = "insert into chitietdathang values ('$idOrderCurrent','$product_id','$qty','$price_session')";
                $resultDetails = mysqli_query($conn,$queryDetails);
                echo "Thành công";
            }

        }

    }else{
        echo 'No exist';
    }
?>
















