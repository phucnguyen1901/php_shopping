
<!-- Kiểm tra username có tồn tại hay không -->

<?php 
    include_once 'condb.php';
    include_once 'change_type_money.php'
?>


<?php

    $username = $_POST['username'];
    $queryCheckUsername = "select * from khachhang where username='$username'";
    $resultCheck = mysqli_query($conn,$queryCheckUsername);
    if(mysqli_num_rows($resultCheck) > 0){
        echo 'Tài khoản đã tồn tại';
    }else{  
        echo 'Tài khoản có thể sử dụng';
    }

?>