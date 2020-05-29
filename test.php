
<?php 
    include_once 'condb.php';

    if(isset($_POST['insert'])){
        $mskh = 1;
        $trangthai = 'Chưa xác nhận';
        $query = "insert into dathang values(null,'$mskh',null,NOW(),'$trangthai')";
        $result = mysqli_query($conn,$query);
        // if ( mysqli_query($conn,$query))
        //     //Thông báo nếu thành công
        //     echo 'Thêm thành công. ID=' . mysqli_insert_id($conn);
        // else
        //     //Hiện thông báo khi không thành công
        //     echo 'Không thành công. Lỗi' . mysqli_error($conn);
        // //ngắt kết nối
        // mysqli_close($conn);
        echo 'Vua moi Them ID = '.mysqli_insert_id($conn);
    }

    
 ?>


 <form action="" method="post">
    
    <input type="submit" name="insert" value="Submit">
 </form>


<?php include 'header.php' ?>

                                                    <?php
                                                    //chi tiet dat hang
                                                    $SoDH = $row['SoDonDH'];
                                                    $queryDetails = "select * from chitietdathang where SoDonDH = $SoDH";
                                                    $resultDetails = mysqli_query($conn,$queryDetails);
                                                    if(mysqli_num_rows($resultDetails) > 0){
                                                        while($row2 = mysqli_fetch_assoc($resultDetails)){
                                                            $MSHH = $row2['MSHH'];
                                                            $queryGoods = "select * from hanghoa where MSHH = $MSHH";
                                                            $resultqueryGoods = mysqli_query($conn,$queryGoods);
                                                            if(mysqli_num_rows($resultqueryGoods) > 0){
                                                                while($row3 = mysqli_fetch_assoc($resultqueryGoods)){?>
                                                                    <tr>
                                                                        <td><h3><?php echo $row3['TenHH']; ?></h3></td>
                                                                        <td><h3><?php echo $row2['soluong']; ?></h3></td>
                                                                    </tr>
                                                        <?php 
                                                                }
                                                            }
                                                        }
                                                    }
                                                        ?>        
                                                    


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
                                                <table>
                                                    <tr>
                                                        <td><h3>Họ tên KH</h3></td>
                                                        <td><h3><?php echo $row['HoTenKH']?></h3></td>
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

                                "img-responsive rounded-circle"