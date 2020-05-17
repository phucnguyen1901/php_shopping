
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