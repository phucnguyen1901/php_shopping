
<!-- Hiển thị tất cả sản phẩm ra trang chủ -->

<?php
	// Phân trang ,  1 trang 6 sản phẩm ,nếu muốn thay đổi số sản phẩm trong 1 trang chỉ cần đổi productOnePage

	$productOnePage = 6; // Số sản phẩm trong 1 trang
	$countProduct = "select * from hanghoa";
	$resultCountProduct = mysqli_query($conn,$countProduct);
	$totalProduct = mysqli_num_rows($resultCountProduct);  // Tổng số lượng sản phẩm có trong cơ sở dữ liệu
	$totalPages = ceil($totalProduct / $productOnePage);
	if(!isset($_GET['page'])){
		$start = 1;
	}else{
		$start = (int)$_GET['page'];
	}
	$position = ($productOnePage*$start) - $productOnePage;		// Vị trí lấy ra các phần tử 

?>
<div id="positionProduct" style="position: relative; bottom: 70px;"></div>

<div class="container">
		<div id="pag" class="mt-3">
			<ul class="pagination pagination-sm">
				<?php 
					if($start == 1){
						echo '<li class="page-item disabled"><a class="page-link bg-info text-white">Previous</a></li>';
					}else{
						echo '<li class="page-item"><a class="page-link bg-info text-white" href="?page='.($start-1).'#positionProduct">Previous</a></li>';
					}
				?>

				<?php
					for($i = 0 ; $i < $totalPages ;$i++){
						if(($i+1) == $start){
							echo '<li class="page-item active"><a class="page-link bg-info text-warning" href="?page='.($i+1).'#positionProduct">'.($i+1).'</a></li>';
						}else{
							echo '<li class="page-item"><a class="page-link bg-info text-white" href="?page='.($i+1).'#positionProduct">'.($i+1).'</a></li>';
						}

						
					}
				?>
				<?php 
					if($start == $totalPages){
						echo '<li class="page-item disabled"><a class="page-link bg-info text-white">Next</a></li>';
					}else{
						echo '<li class="page-item"><a class="page-link bg-info text-white" href="?page='.($start+1).'#positionProduct">Next</a></li>';
					}
				?>

			</ul>
		</div>
		<div class="row">
				<?php 
					
					$sql = "select * from hanghoa limit $position,$productOnePage";
					$result = mysqli_query($conn,$sql);
					if(mysqli_num_rows($result) > 0){
						while ($row = mysqli_fetch_assoc($result)) {
						?>
                              <div class="col-sm-4">
                                             <form action="cart.php" method="POST">
												<img src="<?php echo 'img/'.$row['Hinh'];?>" alt="" style="width: 300px; height: 200px;" class="img-fluid rounded-circle">
												<h3><?php echo $row['TenHH'];?></h3>
												<h5 class="text-warning"><?php echo change_type_money($row['Gia']);?></h5>
												<input type="text" class="form-control mb-3 d-inline-block" style="width:100px;" name="qty" value="1">
												<input type="hidden" class="form-control mb-3 d-inline-block" style="width:100px;" name="price" value="<?php echo change_type_money($row['Gia']);?>">
												<input type="hidden" class="form-control mb-3 d-inline-block" style="width:100px;" name="namecart" value="<?php echo $row['TenHH'];?> ">
												<input type="hidden" class="form-control mb-3 d-inline-block" style="width:100px;" name="id_product" value="<?php echo $row['MSHH'];?> ">
												<button type="submit" name="add" class="btn btn-success mb-1" onclick="save()">Mua Ngay</button>
												<!-- <button class="btn btn-warning ">Thêm vào giỏ hàng</button> -->
                                            </form>
                                </div>
						<?php            
							}
					}
				 ?>
				
		</div>
		<div id="pag2" class="mt-3">
			<ul class="pagination pagination-sm">
			<?php 
					if($start == 1){
						echo '<li class="page-item disabled"><a class="page-link bg-info text-white">Previous</a></li>';
					}else{
						echo '<li class="page-item"><a class="page-link bg-info text-white" href="?page='.($start-1).'#positionProduct">Previous</a></li>';
					}
				?>

				<?php
					for($i = 0 ; $i < $totalPages ;$i++){
						if(($i+1) == $start){
							echo '<li class="page-item active"><a class="page-link bg-info text-warning" href="?page='.($i+1).'#positionProduct">'.($i+1).'</a></li>';
						}else{
							echo '<li class="page-item"><a class="page-link bg-info text-white" href="?page='.($i+1).'#positionProduct">'.($i+1).'</a></li>';
						}

						
					}
				?>
				<?php 
					if($start == $totalPages){
						echo '<li class="page-item disabled"><a class="page-link bg-info text-white">Next</a></li>';
					}else{
						echo '<li class="page-item"><a class="page-link bg-info text-white" href="?page='.($start+1).'#positionProduct">Next</a></li>';
					}
				?>
			</ul>
		</div>
	</div>

