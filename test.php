
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
                                                    
