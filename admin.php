
<!-- Trang quản lí của admin -->

    <?php  include 'headerAdmin.php' ?>

    <div class="container">
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