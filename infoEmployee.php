
<!-- Hiển thị danh sách nhân viên trong trang admin -->


<?php include 'headerAdmin.php' ?>

<div class="container">
        <table class="table table-striped table-dark table-responsive-sm" style="text-align:center;">
            <thead>
                <tr class="text-primary">
                    <th>Mã số nhân viên</th>
                    <th>Họ tên nhân viên</th>
                    <th>Chức vụ</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $queryEmployee = "select * from nhanvien";
                    $resultEmployee = mysqli_query($conn,$queryEmployee);
                    if(mysqli_num_rows($resultEmployee) > 0){
                        while($row = mysqli_fetch_assoc($resultEmployee)){?>
                        <tr style="color:#66FF99;">
                            <td><?php echo $row['MSNV']?></td>
                            <td><?php echo $row['HoTenNV']?></td>
                            <td><?php echo $row['ChucVu']?></td>
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



