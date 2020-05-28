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

    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="img/logo.jpg" alt="logo" style="width: 100px; height: 50px;">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link text-primary" href="#">Đơn hàng <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="#">Hàng hóa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="#">Khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="#">Nhân viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="#">Thống kê</a>
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

    .<div class="container">
        <table class="table table-striped table-dark    ">
            <thead>
                <tr class="text-primary">
                    <th>Số đơn hàng</th>
                    <th>Nhân viên xác nhận</th>
                    <th>Tình trạng đơn hàng</th>
                    <th>Chi tiết</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $queryOrder = "select * from dathang";
                    $resultOrder = mysqli_query($conn,$queryOrder);
                    if(mysqli_num_rows($resultOrder) > 0){
                        while($row = mysqli_fetch_assoc($resultOrder)){?>
                        <tr style="color:#66FF99;">
                            <td><?php echo $row['SoDonDH']?></td>
                            <td><?php echo $row['MSNV']?></td>
                            <td><?php echo $row['TrangThai']?></td>
                            <td>
                            <!-- <button class="btn btn-outline-warning">Xem chi tiết</button> -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modelId">
                            Xem chi tiết
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Xác nhận đơn hàng</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <table border="1px solid blue">
                                                <tr>
                                                    <td><h3>Họ tên KH</h3></td>
                                                    <td><h3>nguyễn văn a</h3></td>
                                                </tr>
                                                <tr>
                                                    <td><h3>Số điện thoại</h3></td>
                                                    <td><h3></h3></td>
                                                </tr>
                                                <tr>
                                                    <td><h3>Địa chỉ</h3></td>
                                                    <td><h3></h3></td>
                                                </tr>
                                                </table>
                                                <h3>Hàng hóa mua</h3>
                                                <table>
                                                <?php
                                                    //chi tiet dat hang
                                                    $SoDH = $row['SoDonDH'];
                                                    $queryDetails = "select * from chitietdathang where SoDonDH = '$SoDH'";
                                                    $resultDetails = mysqli_query($conn,$queryDetails);
                                                    if(mysqli_num_rows($resultDetails) > 0){
                                                        while($row2 = mysqli_fetch_assoc($resultDetails)){
                                                            $MSHH = $row2['MSHH'];
                                                            $queryGoods = "select * from hanghoa where MSHH = '$MSHH'";
                                                            $resultqueryGoods = mysqli_query($conn,$queryGoods); ?>
                                                            <tr>
                                                    <?php   if(mysqli_num_rows($resultqueryGoods) > 0){
                                                                while($row3 = mysqli_fetch_assoc($resultqueryGoods)){?>

                                                                        <td><h3><?php echo $row3['TenHH']; ?></h3></td>
                                                        <?php 
                                                                }
                                                            }?>
                                                                <td><h3><?php echo $row2['Soluong']; ?></h3></td>
                                                            </tr>
                                                    <?php    }
                                                    }
                                                        ?>        
                                            </table>
                                            <h3 class="mt-3">Tổng tiền: <?php echo change_type_money($row['TongTien'])?></h3> 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            <button type="button" class="btn btn-primary">Xác nhận đơn hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
                        </tr>
                 <?php  }
                    }
                ?>

            </tbody>
        </table>
    </div>
</body>
</html>
