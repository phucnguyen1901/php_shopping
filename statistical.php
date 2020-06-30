

<!-- Trang thống kê doanh thu -->


<?php include 'headerAdmin.php' ?>


<div class="container">
    <form action="statistical.php" method="get">
        <select name="month" class="mr-2" >
                <?php
                    for($i = 0; $i< 12; $i++){
                        if(isset($_GET['month']) && $_GET['month']==($i+1)){
                            echo '<option selected="selected" value="'.($i+1).'">Tháng '.($i+1).'</option>';
                        }else{
                            echo '<option value="'.($i+1).'">Tháng '.($i+1).'</option>';
                        }
                        
                    }
                ?>
        </select>

        <select name="year" class="mr-3">
                <?php
                    for($i = 0; $i< 15; $i++){
                        if(isset($_GET['year']) && $_GET['year']==($i+2020)){
                            echo '<option selected="selected" value="'.($i+2020).'">Năm '.($i+2020).'</option>';
                        }else{
                            echo '<option value="'.($i+2020).'">Năm '.($i+2020).'</option>';
                        }
                       
                    }
                ?>
        </select>

        <span> <button class="btn btn-outline-success mb-2">Thống kê</button></span>
    </form>
</div>

<?php 
    $notify = '';
    $price = '';

    $queryStatisticalProduct = "select hanghoa.TenHH,D.TongGiaDatHang from hanghoa inner join (select B.mshh,B.TongGiaDatHang from (select mshh , sum(GiaDatHang) as TongGiaDatHang from chitietdathang GROUP BY MSHH) B 
    where B.TongGiaDatHang = (select max(C.TongGiaDatHang) from (select mshh , sum(GiaDatHang) as TongGiaDatHang from chitietdathang GROUP BY MSHH) C)) D where hanghoa.MSHH = D.MSHH";

    $resultStatisticalProduct = mysqli_query($conn,$queryStatisticalProduct);
    $totalStatisticalProduct = mysqli_fetch_assoc($resultStatisticalProduct);
    
    if(mysqli_num_rows($resultStatisticalProduct) > 0){
        $notify = $totalStatisticalProduct['TenHH'];
        $price = $totalStatisticalProduct['TongGiaDatHang'];
    }

    // Thống kê theo tháng
    if(isset($_GET['month']) && isset($_GET['year'])){

        $month = (int)$_GET['month'];
        $year = (int)$_GET['year'];
        $queryStatistical= "select sum(TongTien) as total from dathang where month(ngayDH)=($month) and year(ngayDH)=($year)";
        $resultStatistical = mysqli_query($conn,$queryStatistical);
        $totalStatistical = mysqli_fetch_assoc($resultStatistical);

        if($totalStatistical['total'] != NULL){
            if(isset($_GET['month']) && isset($_GET['year'])){?>
                <div class="container">
                <table class="table table-striped table-dark table-responsive-sm" style="text-align:center;">
                    <thead>
                        <tr class="text-primary">
                            <th>Tháng/Năm</th>
                            <th>Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td class="text-warning" rowspan="2"><?php echo $month.'/'.$year;?></td>
                                <td class="text-warning"><?php echo change_type_money($totalStatistical['total']); ?></td>
                            </tr>
                    </tbody>
                </table>
                <br><br>
            </div>
            
    
        <?php }
        } else{
            echo '<div class="container">
                    <h3 class="text-danger">Tháng này không có thống kê</h3>
                </div>
                ';
        }
    }
?>
    <div class="container">
        <h3 class="text-success">Sản phẩm bán chạy nhất từ trước tới giờ: <?php echo $notify.' - '.change_type_money($price).'VND'; ?> </h3>
    </div>
</body>
</html>
        