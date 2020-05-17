

<?php
        function processNameUser($str){
            $len = strlen($str) - 2;
            $newStr = substr($str,1,$len);
            return $newStr;
        }


        $a = '\'hello baby\'';

        $b = processNameUser($a);

        echo $b;



?>

<?php
    // session_start();
    // if(isset($_POST['login'])){
    //     if(isset($_SESSION['login'])){
    //         include 'manage.php';
    //         session_destroy();
    //     }else{
    //         // $sql = "select * from nvlogin where username='".$_POST['username']."' and password='".$_POST['password']."'";
    //         $queryNamEmployee = "select * from nvlogin inner join nhanvien on nvlogin.username='".$_POST['username']."' and nvlogin.passwd='".$_POST['password']."' and nvlogin.MSNV = nhanvien.MSNV";
    //         $result = mysqli_query($conn,$queryNamEmployee);
    //         if(mysqli_num_rows($result) > 0){
    //             // $count = count($_SESSION['login']);
    //             $row = mysqli_fetch_assoc($result);
    //             $item_arr = array(
    //                 'id_user' => "'".$row['id']."'",
    //                 'username' => "'".$row['username']."'"
    //                 // 'fullname' => "'".$row['fullname']."'"
    //             );
    //             $_SESSION['login'][0] = $item_arr;
    //             include 'manage.php';
    //             print_r( $_SESSION['login']);
    //             // session_destroy();

    //         }else{
    //             header("Location: ./login.php");
    //         }
    //     }
    // }else{
    //     header("Location: ./login.php");
    // }
?>

<div class="container mt-5">
        <h4>Quản lí đơn hàng</h4>
        <div class="table-responsive">
        <table class="table table-dark table-bordered ">
            <thead>
                <tr>
                    <th>Họ tên khách hàng</th>
                    <th>Tên hàng hóa</th>
                    <th>Số lượng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái xác nhận</th>
                    <th>Nhân viên xác nhận</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo 'a' ?></td>
                    <td><?php echo 'a'  ?></td>
                    <td><?php echo 'a'  ?></td>
                    <td><?php echo 'a'  ?></td>
                    <td><?php echo 'a'  ?></td>
                    <td><?php echo 'a'  ?></td>
                    <!-- Button trigger modal -->
                    <td><button  type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modelId">Confirm</button>
                     <!-- Modal -->
                     <div class="modal fade text-success" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Xác nhận đơn hàng</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <lable> Mã số đơn hàng:</label><input type="text" class="form-control d-inline-block" style="width:120px;">
                                    <br>
                                    <lable> Mã số khách hàng: </label><input type="text" class="form-control d-inline-block mt-3" style="width:100px;">
                                    <br><label for="" class="mt-3">Họ tên khách hàng:</label> <span>asad</span>
                                    <br><label for="" class="mt-3">Tên chó:</label> <span>a</span>
                                    <br><label for="" class="mt-3">Số Lượng:</label>
                                    <br><label for="" class="mt-3">Tổng tiền:</label>
                                    <br><label for="" class="mt-3">Địa chỉ:</label>
                                    <br><label for="" class="mt-3">Số điện thoại:</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </td>
                  </tr>
            </tbody>
        </table>
        </div>
    </div>

    <?php
						if(isset($_SESSION['login_admin'])){
                    ?>
							<span style="font-size:15px; color:white" class="mr-3"><?php echo 'Xin Chào, '.processNameUser($_SESSION['login'][0]['fullname'])?></span>
							<form action="" method="post">
								<button type="submit" name="out" class="btn btn-warning">Đăng Xuất</button>
							</form>
						<?php}?>
            </div>

            <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="#">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.jpg" alt="logo" style="width: 100px; height: 50px;">
                </a>
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Đơn hàng <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hàng Hóa<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Khách Hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nhân viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Thống kê</a>
                    </li>
                </ul>
                         <!-- <span style="font-size:15px; color:white" class="mr-3"><?php echo 'Xin Chào, '.processNameUser($_SESSION['login'][0]['fullname'])?></span> -->
                    <!-- <form action="" method="post">
                        <button type="submit" name="out" class="btn btn-warning">Đăng Xuất</button>
                    </form> -->
                <div>
                <a href="">Hello</a>
                </div>

                </div>
        </nav>
    </div>