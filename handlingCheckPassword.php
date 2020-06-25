
<!-- Kiểm tra password nhập có trùng khớp -->


<?php

    $password = $_POST['password'];
    $repeatpassword = $_POST['repeatpassword'];

    if($password!=$repeatpassword){
        echo 'Mật khẩu nhập lại không giống nhau';
    }

?>