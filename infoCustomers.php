

<!-- Hiển thị tất cả khách hàng trong trang admin  -->

<?php include 'headerAdmin.php' ?>	

<div class="container">
        <table class="table table-striped table-dark table-responsive-sm" style="text-align:center;">
            <thead>
                <tr class="text-primary">
                    <th>Mã số khách hàng</th>
                    <th>Họ tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $queryCustomers = "select * from khachhang";
                    $resultCustomers = mysqli_query($conn,$queryCustomers);
                    if(mysqli_num_rows($resultCustomers) > 0){
                        while($row = mysqli_fetch_assoc($resultCustomers)){?>
                        <tr style="color:#66FF99;">
                            <td><?php echo $row['MSKH']?></td>
                            <td><?php echo $row['HoTenKH']?></td>
                            <td><?php echo $row['DiaChi']?></td>
                            <td><?php echo $row['SoDienThoai']?></td>
                
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>




