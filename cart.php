
<!-- Giỏ hàng -->

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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <link rel="stylesheet" type="text/css" href="./css/index.css">
</head>
<body onload="document.transferForm.submit()">

    <?php include 'header.php' ?>
        <?php
            $total = 0;
            // session_destroy();
            // if(isset($_POST['qty']) < 1){
            //     echo '<script> alert("Số lượng không hợp lệ)</script>';
            // }
            if(isset($_POST["add"])){
                if($_POST['qty'] < 1){
                    echo '<form action="index.php" name="transferForm" method="post">
                            <input type="hidden" name="error" value="1">;
                          </form>';
                }else{
                    if(isset($_SESSION['cart'])){
                        $item_arr_id = array_column($_SESSION['cart'],'product_id');
                        if(!in_array($_POST['id_product'],$item_arr_id)){
                            if(session_id() == '') {
                                session_start();
                            }                        
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

            }

            if(isset($_GET['delete'])){
                 foreach($_SESSION['cart'] as $key => $value){
                        if($value['product_id'] == $_GET['id']){
                            unset($_SESSION['cart'][$key]); 
                        }
                    }
                }

        ?>

        <div class="container" style="margin-top:150px;">
        <table class="table table-bordered table-dark table-responsive-sm">
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

        <?php
            if(isset($_SESSION['login'])){ ?>
            <div class="container" style="text-align:center; margin-top:30px;">
                <form action="notification.php" method="post" style="padding: 20px;">
                    <div class="form-group">
                        <label for="" style="width: auto;" class="mt-3">Họ tên Khách Hàng:<span class="text-danger"> <?php echo processNameUser($_SESSION['login'][0]['fullname']);?></span> </label>
                        <input type="hidden" class="form-control mb-3 d-inline-block" name="insert_name" placeholder="Họ tên khách hàng" value="<?php echo processNameUser($_SESSION['login'][0]['fullname']);?>">
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="" style="width: auto;" class="mt-3">Số điện thoại:<span class="text-danger"> <?php echo processNameUser($_SESSION['login'][0]['numberphone']) ?></span> </label>
                        <input type="hidden" class="form-control mb-3 d-inline-block" name="insert_numberphone" placeholder="Nhập số điện thoại" value="<?php echo processNameUser($_SESSION['login'][0]['numberphone']);?>">
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="" style="width: auto;" class="mt-3">Địa chỉ: <span class="text-danger"><?php echo processNameUser($_SESSION['login'][0]['address']) ?></span> </label>
                        <input type="hidden" class="form-control mb-3 d-inline-block" name="insert_address" placeholder="Địa chỉ" value="<?php echo processNameUser($_SESSION['login'][0]['address']);?>"><br>
                    </div>
                    <div class="form-group">
                        <label for="" style="width: 150px;" class="mt-3">Tổng tiền:</label> 
                    </div>
                        <span class="text-danger">
                            <?php 
                                if($total!=0){
                                    echo change_type_money((string)$total); 
                                } 
                            ?>
                            <br>
                        </span>
                    <input type="hidden" name="totalamount" value="<?php echo $total; ?>">
                        <br> 
                        <input type="submit" value="Đặt hàng ngay" class="btn btn-success mt-1" name="insert_database">
                </form>
            </div>
            <div style="margin-top:158px;"></div>
        <?php }else{?>
            <div class="container" style="text-align:center; margin-top:40px;">
            <span>Mua nhanh hoặc</span>
            <a href="login.php" class="btn btn-warning">Đăng nhập tại đây</a>
        </div>
        <div class="container" style="text-align:center; margin-top:20px;">
            <form action="notification.php" method="post" style="padding: 20px;">
                <div class="form-group">
                    <label for="" style="width: 150px;" class="mt-3">Họ tên:</label>
                    <input type="text" class="form-control mb-3 d-inline-block" style="width:300px;" name="insert_name" placeholder="Họ tên khách hàng">
                    <br>
                </div>
                <div class="form-group">
                    <label for="" style="width: 150px;" class="mt-3">Số điện thoại:</label>
                    <input type="text" class="form-control mb-3 d-inline-block" style="width:300px;" name="insert_numberphone" placeholder="Nhập số điện thoại">
                    <br>
                </div>
                    <div class="form-group">
                    <label for="" style="width: 150px;" class="mt-3">Địa chỉ:</label>
                    <input type="text" class="form-control mb-3 d-inline-block" style="width:300px;" name="insert_address" placeholder="Địa chỉ">
                    <br>
                </div>
                <div class="form-group">
                    <label for="" style="width: 150px;" class="mt-3">Tổng tiền:</label> 
                </div>
                <span class="text-danger">
                    <?php 
                        if($total!=0){
                            echo change_type_money((string)$total); 
                        } 
                    ?>
                    <br>
                </span>
                <input type="hidden" name="totalamount" value="<?php echo $total; ?>">
                <br>
                <input type="submit" value="Đặt hàng ngay" class="btn btn-success" name="insert_database">
                </div>
                </form>
            </div>
       <?php } ?>
        


        <?php
            // var_dump($_SESSION['cart']);
            // print_r($_SESSION['cart']);
        ?>
        <script>
            document.getElementById("myForm").submit();
        </script>

</body>
</html>
