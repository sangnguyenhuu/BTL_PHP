<?php 
// **************phân trang*********************
	//truy vấn danh mục
	$sql_loaisp = "select * from loaisp";
	$query_loaisp = mysqli_query($mysqli, $sql_loaisp);
	///////
	//tìm kiếm
	if (isset($_POST['timkiem'])) {
	$tukhoa = $_POST['search-product'];
    $sql_pro = "select * from sanpham where tensp like '%$tukhoa%'";
	$query_pro = mysqli_query($mysqli, $sql_pro);
	$count =  mysqli_num_rows($query_pro);
	//$row_title = mysqli_fetch_array($query_pro);
	}
  


 

// *********************************************
 ?>
<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Tổng quan sản phẩm
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 " >
						<a href="index.php?quanly=shop" class="text-dark">All Products</a>
						
					</button>
					<?php while($row_loaisp = mysqli_fetch_array($query_loaisp)){ 
							if(isset($_GET['id'])){

								if($row_loaisp['Maloaisp']==$_GET['id']){


						?>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" >
						<a href="index.php?quanly=shop&id=<?php echo $row_loaisp['Maloaisp'] ?>" class="text-dark"><?php echo $row_loaisp['Tenloaisp'] ?></a>
						
					</button>
					<?php }else{ ?>

						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 " >
						<a href="index.php?quanly=shop&id=<?php echo $row_loaisp['Maloaisp'] ?>" class="text-dark"><?php echo $row_loaisp['Tenloaisp'] ?></a>
						
					</button>
					<?php }}else{ ?>	
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" >
						<a href="index.php?quanly=shop&id=<?php echo $row_loaisp['Maloaisp'] ?>" class="text-dark"><?php echo $row_loaisp['Tenloaisp'] ?></a>
					<?php }} ?>	
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<form action="index.php?quanly=timkiem" method="POST" class="d-flex">
						<button type="submit" name="timkiem" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<a href="index.php?quanly=timkiem">
								<i class="zmdi zmdi-search"></i>
							</a>
						</button>
						
							<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
						
						</form>
					</div>	
				</div>

				<!-- Filter -->
				
			</div>

			<div class="row isotope-grid">
				<?php 
				if($count > 0){
					while($row_pro = mysqli_fetch_array($query_pro)){

				 ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img style="width: 270px; height: 270px;" src="admincp/HinhanhSP/<?php echo $row_pro['Hinhanh']; ?>" alt="IMG-PRODUCT">

							<a href="index.php?quanly=chitietsanpham&id=<?php echo $row_pro['Masp'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Chi tiết 
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="index.php?quanly=chitietsanpham&id=<?php echo $row_pro['Masp'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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

				<?php 
					}}else {echo "không tìm thấy sản phẩm nào";}
				 ?>
			</div>
		</div>
		
	</section>