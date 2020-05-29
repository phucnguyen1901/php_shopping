<?php 
	include_once 'condb.php';
	include_once 'change_type_money.php'
 ?>

<?php   

    if(isset($_POST['MSKH']) && isset($_POST['SodonDH']) ){
        $output = '';
        $MSKH = $_POST['MSKH'];
        $SodonDH = $_POST['SodonDH'];
        $queryCustomers = "select * from khachhang where MSKH=$MSKH";
        $resultCustomers = mysqli_query($conn,$queryCustomers);
        $output .= '
        <h4>Thông tin khách hàng</h4>
        <div class="table-responsive">
            <table class="table table-bordered text-primary">';
        if(mysqli_num_rows($resultCustomers) > 0){
            while($row = mysqli_fetch_assoc($resultCustomers)){
                $output .= '
                    <tr>
                        <td width="30%">Tên Khách Hàng</td>
                        <td class="text-danger">'.$row['HoTenKH'].'</td>
                    </tr>
                    <tr>
                        <td width="30%">Số điện thoại</td>
                        <td class="text-danger">'.$row['SoDienThoai'].'</td>
                    </tr>
                    <tr>
                        <td width="30%">Địa chỉ</td>
                        <td class="text-danger">'.$row['DiaChi'].'</td>
                    </tr>
                ';
            }
        }
        $output .='</table></div>';
        $output .= '
        <h4>Sản phẩm đã đặt</h4>
        <div class="table-responsive">
            <table class="table table-bordered text-primary">
            <tr>
            <td width="70%">Tên sản phẩm</td>
            <td>Số lượng</td>
        </tr>';
        $querySumMoney = "select SUM(GiaDatHang*Soluong) from chitietdathang inner join hanghoa on
        chitietdathang.MSHH=hanghoa.MSHH where chitietdathang.SoDonDH=$SodonDH";
        $resultSumMoney = mysqli_query($conn,$querySumMoney);
        $rowSumMoney = mysqli_fetch_assoc($resultSumMoney); // tinh tong so tien

        $queryOrderDetails = "select * from chitietdathang inner join hanghoa on  
        chitietdathang.MSHH=hanghoa.MSHH where SoDonDH=$SodonDH";
        $resultOrderDetails = mysqli_query($conn,$queryOrderDetails);  // show ten , sdt , dia chi khach hang
        if(mysqli_num_rows($resultOrderDetails) > 0){
            while($row2 = mysqli_fetch_assoc($resultOrderDetails)){
                $output.= '
                    <tr>
                    <td width="70%">'.$row2['TenHH'].'</td>
                        <td>'.$row2['Soluong'].'</td>
                    </tr>
                ';
            }
        }
        $output .='</table></div>
            <input type="hidden" name="SodonDH" value="'.$SodonDH.'">
            <div class="form-group">
                <label for=""><h4>Trạng thái đơn hàng</h4></label>
                <select class="form-control" name="choose_status">
                    <option>Chưa xác nhận</option>
                    <option>Đã xác nhận</option>
                    <option>Đang chuyển hàng</option>
                    <option>Đã giao thành công</option>
                </select>
            </div>';
        $output .= '<h2>Tổng tiền: <span class="text-danger">'.change_type_money($rowSumMoney['SUM(GiaDatHang*Soluong)']).'</span></h2>';
        echo $output;
    }

?>