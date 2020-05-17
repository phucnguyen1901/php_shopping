<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="manage.css">
    <title>Quản lí</title>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-to">
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
                <div class="text-warning">
                    <!-- Xin chào,
                    <span class="text-success mr-4">  echo $row['HoTenNV']; ?></span>
                    <a href="login.php" class="btn btn-danger">Thoát</a> -->
                </div>

            </div>
        </nav>
    </div>

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
   
</body>
</html>