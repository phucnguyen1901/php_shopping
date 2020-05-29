<div class="container" id="content">
		<div id="pag" class="mt-3">
			<ul class="pagination pagination-sm">
				<li class="page-item"><a class="page-link bg-info text-white" href="#">Previous</a></li>
				<li class="page-item active"><a class="page-link bg-info text-white" href="#">1</a></li>
				<li class="page-item"><a class="page-link bg-info text-white" href="#">2</a></li>
				<li class="page-item"><a class="page-link bg-info text-white" href="#">3</a></li>
				<li class="page-item"><a class="page-link bg-info text-white" href="#">Next</a></li>
			</ul>
		</div>
		<div class="row">
				<?php 
					$sql = 'select * from hanghoa';
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
												<button type="submit" name="add" class="btn btn-success mb-1">Mua Ngay</button>
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
				<li class="page-item"><a class="page-link bg-info text-white" href="#">Previous</a></li>
				<li class="page-item active"><a class="page-link bg-info text-white" href="#">1</a></li>
				<li class="page-item"><a class="page-link bg-info text-white" href="#">2</a></li>
				<li class="page-item"><a class="page-link bg-info text-white" href="#">3</a></li>
				<li class="page-item"><a class="page-link bg-info text-white" href="#">Next</a></li>
			</ul>
		</div>
	</div>

