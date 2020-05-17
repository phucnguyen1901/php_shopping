
<?php 
	include_once 'condb.php';
	include_once 'change_type_money.php'
 ?>

<?php
// if(isset($_POST['login'])){
// 	if(isset($_SESSION['login'])){
// 		header("Location: ./index.php");
// 	}else{
// 		session_start();
// 		$item_arr = array(
// 			'id_user' => "1",
// 			'username' => "nv1"
// 		);
// 		$_SESSION['login'][0] = $item_arr;
// 		print_r( $_SESSION['login']);
// }}
	session_start();
	if(isset($_SESSION['login'])){
		$check = 1;
	}else{
		$check = 0;
	}

   if(isset($_POST["out"])){
		session_destroy();
		header("Location: ./login.php");
	}

?>



<div class="container-fuild">
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
			<a class="navbar-brand" href="#">
				<img src="img/logo.jpg" alt="logo" style="width: 100px; height: 50px;">
			</a>
			<button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavId">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
					</li>
					
					<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Giống Chó</a>
						<div class="dropdown-menu" aria-labelledby="dropdownId">
							<a class="dropdown-item" href="#">Tất cả</a>
							<?php 
								$groupgoods = 'select * from nhomhanghoa';
								$resultgroupgoods = mysqli_query($conn,$groupgoods);
								if(mysqli_num_rows($resultgroupgoods) > 0){
									while ($row = mysqli_fetch_assoc($resultgroupgoods)) {
										echo	'<a class="dropdown-item" href="#">'.$row["TenNhom"].'</a>';
									}
								}
							?>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Liên Hệ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="odersearch.php">Tra đơn hàng</a>
                    </li>
                    <li class="nav-item">
						<a class="nav-link" href="cart.php">Giỏ hàng</a>
					</li>
				</ul>

					<?php
						if($check == 1){?>
							<span style="font-size:15px; color:white" class="mr-3"><?php echo 'Xin Chào, '.processNameUser($_SESSION['login'][0]['fullname'])?></span>
							<form action="" method="post">
								<button type="submit" name="out" class="btn btn-warning">Đăng Xuất</button>
							</form>
						<?php }else{
								echo '<a href="login.php" class="btn btn-warning">Đăng Nhập</a>';
							}?>

			</div>
		</nav>
	
</div>


