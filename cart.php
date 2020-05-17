<?php 
	include_once 'condb.php';
	include_once 'change_type_money.php'
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
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
            session_start();
            $total = 0;
            // session_destroy();
            if(isset($_POST["add"])){
                if(isset($_SESSION['cart'])){
                    $item_arr_id = array_column($_SESSION['cart'],'product_id');
                    if(!in_array($_POST['id_product'],$item_arr_id)){
                        $count = count($_SESSION['cart']);
                        $item_arr = array(
                            'product_id' => $_POST['id_product'],
                            'cartname' => $_POST['namecart'],
                            'price_session' => $_POST['price'],
                            'qty' => $_POST['qty']
                        );
                        $_SESSION['cart'][$count] = $item_arr;
                    }else{
                        $count2 = 0;
                        foreach($_SESSION['cart'] as $key => $value){
                            if($value['product_id'] == $_POST['id_product']){
                                $receiveKey = $count2;
                                $_SESSION['cart'][$receiveKey]['qty'] += $_POST['qty']; 
                                break;
                            }
                            $count2 += 1;
                        }
                     }
                    
            }else{
                    $item_arr = array(
                        'product_id' => $_POST['id_product'],
                        'cartname' => $_POST['namecart'],
                        'price_session' => $_POST['price'],
                        'qty' => $_POST['qty'] 
                    );
                    $_SESSION['cart'][0] = $item_arr;
                }
            }

            if(isset($_GET['delete'])){
                 foreach($_SESSION['cart'] as $key => $value){
                        if($value['product_id'] == $_GET['id']){
                            unset($_SESSION['cart'][$key]); 
                        }
                    }
                }

        ?>

        <div class="container" style="margin-top:100px;">
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                <th>Tên chó</th>
                <th>Mã số chó</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng giá</th>
                </tr>
            </thead>
            <?php
            if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $key =>$value){
                    ?>
            <tbody>
                <tr>
                    <td><?php echo $value['cartname']; ?></td>
                    <td><?php echo $value['product_id']; ?></td>
                    <td>
                        <?php echo $value['qty']; ?>
                    </td>
                    <td><?php echo $value['price_session']; ?></td>
                    <td>
                        <?php echo change_type_money((string)(change_typeold_money($value['price_session'])*$value['qty']));
                             $total += change_typeold_money($value['price_session'])*$value['qty'];
                        ?>
                    </td>
                    <td>
                        <form method="get" action="cart.php">
                            <input type="hidden" name="id" value="<?php echo $value['product_id']; ?>">
                            <input type="submit" name="delete" value="Xóa" class="btn btn-danger">
                        </form>
                        <?php //<a href="cart.php?action=delete&id=<?php echo $value['product_id'];"><span class="btn btn-danger">Xóa</span></a> ?>

                    </td>

                </td>
                </tr>
            </tbody>
            <?php
                }
                    
            }
            ?>
        </table>
        </div>
        <div class="container" style="text-align:center; margin-top:20px;">
            <a href="index.php#content" class="btn btn-success">Tiếp tục mua hàng</a>
        </div>
        <div class="container" style="text-align:center; margin-top:80px;">
            <form action="" style="padding: 20px;">
                <label for="" style="width: 150px;" class="mt-3">Họ tên:</label>
                <input type="text" class="form-control mb-3 d-inline-block" style="width:500px;" name="qty" placeholder="Họ tên khách hàng">
                <br>
                <label for="" style="width: 150px;" class="mt-3">Số điện thoại:</label>
                <input type="text" class="form-control mb-3 d-inline-block" style="width:500px;" name="qty" placeholder="Nhập số điện thoại">
                <br>
                <label for="" style="width: 150px;" class="mt-3">Địa chỉ:</label>
                <input type="text" class="form-control mb-3 d-inline-block" style="width:500px;" name="qty" placeholder="Địa chỉ">
                <br>
                <label for="" style="width: 150px;" class="mt-3">Tổng tiền:</label> 
                <span class="text-danger">
                    <?php 
                        if($total!=0){
                            echo change_type_money((string)$total); 
                        } 
                    ?>
                </span>
                <br>
                <input type="submit" value="Đặt hàng ngay" class="btn btn-success">
                </form>
        </div>

        <?php
            // var_dump($_SESSION['cart']);
            // print_r($_SESSION['cart']);
        ?>
    	<?php include 'footer.php' ?>	
</body>
</html>