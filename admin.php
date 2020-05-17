<?php 
	include_once 'condb.php';
 ?>


<?php
    session_start();
    if(isset($_POST['login'])){
        if(isset($_SESSION['login'])){
            include 'manage.php';
            session_destroy();
        }else{
            // $sql = "select * from nvlogin where username='".$_POST['username']."' and password='".$_POST['password']."'";
            $queryNamEmployee = "select * from nvlogin inner join nhanvien on nvlogin.username='".$_POST['username']."' and nvlogin.passwd='".$_POST['password']."' and nvlogin.MSNV = nhanvien.MSNV";
            $result = mysqli_query($conn,$queryNamEmployee);
            if(mysqli_num_rows($result) > 0){
                // $count = count($_SESSION['login']);
                $row = mysqli_fetch_assoc($result);
                $item_arr = array(
                    'id_user' => "'".$row['id']."'",
                    'username' => "'".$row['username']."'"
                    // 'fullname' => "'".$row['fullname']."'"
                );
                $_SESSION['login'][0] = $item_arr;
                include 'manage.php';
                print_r( $_SESSION['login']);
                // session_destroy();

            }else{
                header("Location: ./login.php");
            }
        }
    }else{
        header("Location: ./login.php");
    }
?>
