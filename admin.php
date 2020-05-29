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
        <table class="table table-striped table-dark table-responsive-sm" style="text-align:center;">
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
                            <td><?php 
                                    if($row['MSNV']==NULL){
                                        echo "Chưa có nhân viên xác nhận";
                                    }else{
                                        echo "Mã số : ".$row['MSNV'];
                                    }
                                ?>
                            </td>
                            <td><?php echo $row['TrangThai']?></td>
                            <td><input type="button" class="view_data btn btn-outline-primary" name="<?php echo $row['SoDonDH'];?>" value="Xem chi tiết" id="<?php echo $row['MSKH'];?>"></td>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="dataModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chi tiết đặt hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="handlingAdmin.php" method="post">
                <div class="modal-body" id="orders_Details">
                    Body
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" name="confirm">Xác nhận</button>
                        <!-- <input type="submit" value="Xác nhận"> -->
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.view_data').click(function(){
            let MSKH = $(this).attr('id');
            let SodonDH = $(this).attr('name');
            $.ajax({
                url: "showOrdersDetails.php",
                method: "post",
                data: {MSKH:MSKH,SodonDH:SodonDH},
                success: function(data){
                    $('#orders_Details').html(data);
                    $('#dataModal').modal("show");
                }
            });


        });
    });
</script>