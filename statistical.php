

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
    if(isset($_GET['month']) && isset($_GET['year'])){
        $month = (int)$_GET['month'];
        $year = (int)$_GET['year'];
        $queryStatistical= "select sum(TongTien) as total from dathang where month(ngayDH)=($month) and year(ngayDH)=($year)";
        $resultStatistical = mysqli_query($conn,$queryStatistical);
        $totalStatistical = mysqli_fetch_assoc($resultStatistical);
        
        // echo $month.'/'.$year;
    }

?>

<?php
    if(isset($_GET['month']) && isset($_GET['year'])){?>
        <div class="container">
        <table class="table table-striped table-dark table-responsive-sm" style="text-align:center;">
            <thead>
                <tr class="text-primary">
                    <th>Tháng/Năm</th>
                    <th>Doanh thu</th>
                    <th>Sản phẩm bán nhiều nhất</th>
                    <th>Sản phẩm bán ít nhất</a></th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td rowspan="2"><?php echo $month.'/'.$year;?></td>
                        <td><?php echo change_type_money($totalStatistical['total']); ?></td>
                        <td>b</td>
                        <td>c</td>
                    </tr>
            </tbody>
        </table>
    </div>
    <?php } ?>

</body>
</html>
        