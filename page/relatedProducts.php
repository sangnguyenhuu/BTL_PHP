<?php 
	if(isset($_GET['idloaisp'])&&isset($_GET['id'])){
		$idsp = $_GET['id'];
		$idloaisp = $_GET['idloaisp'];
		$sql_pro = "select * from sanpham where maloaisp = '".$idloaisp."' and masp <> '".$idsp."' order by masp desc LIMIT 1, 8";
		$query_pro = mysqli_query($mysqli, $sql_pro);
	
	
 ?>
<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					SẢN PHẨM LIÊN QUAN
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php 
						while($row_pro = mysqli_fetch_array($query_pro)){
					?>
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
						<div class="block2-pic hov-img0">
							<img style="width: 270px; height: 270px;" src="admincp/HinhanhSP/<?php echo $row_pro['Hinhanh']; ?>" alt="IMG-PRODUCT">

							<a href="index.php?quanly=chitietsanpham&id=<?php echo $row_pro['Masp'] ?>&idloaisp=<?php echo $row_pro['Maloaisp'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Chi tiết 
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="index.php?quanly=chitietsanpham&id=<?php echo $row_pro['Masp'] ?>&idloaisp=<?php echo $row_pro['Maloaisp'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php 
										echo $row_pro['Tensp']

									 ?>
								</a>

								<span class="stext-105 cl3">
									<?php echo number_format($row_pro['Dongiaban']).'vnđ'?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

<?php } ?>