<?php 
// **************phân trang*********************
	//truy vấn danh mục
	$sql_loaisp = "select * from loaisp";
	$query_loaisp = mysqli_query($mysqli, $sql_loaisp);
	///////

  if(!isset($_GET['page'])){  
    $page = 1;  
    } else {  
    $page = $_GET['page'];  
    }  

    // Chọn số kết quả trả về trong mỗi trang mặc định là 10 
    $items_per_page = 16;  

    // Tính số thứ tự giá trị trả về của đầu trang hiện tại 
    $from = (($page * $items_per_page) - $items_per_page);  

    // Chạy 1 MySQL query để hiện thị kết quả trên trang hiện tại  


 

// *********************************************
if (isset($_GET['id'])) {
    // Biến 'id' tồn tại, bạn có thể sử dụng nó ở đây
    $sql_pro = "select * from sanpham where maloaisp = '".$_GET['id']."' order by masp desc LIMIT $from, $items_per_page";
	$query_pro = mysqli_query($mysqli, $sql_pro);
	//$row_title = mysqli_fetch_array($query_pro);
	//lấy tên danh mục
	// $sql_cate = "select * from tbl_danhmuc where id_danhmuc = '".$_GET['id']."'";
	// $query_cate = mysqli_query($mysqli, $sql_cate);
	// $row_title = mysqli_fetch_array($query_cate);
} else {
    // Biến 'id' không tồn tại, xử lý trường hợp này ở đây
    $sql_pro = "select * from sanpham  order by masp desc LIMIT $from, $items_per_page";
	$query_pro = mysqli_query($mysqli, $sql_pro);
	//$row_title = mysqli_fetch_array($query_pro);
	//lấy tên danh mục
	//$row_title['tendanhmuc'] = 'toàn bộ';
}

 ?>
<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					TỔNG QUAN SẢN PHẨM
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 " >
						<a href="index.php?quanly=shop" class="text-dark">Toàn bộ sản phẩm</a>
						
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
					while($row_pro = mysqli_fetch_array($query_pro)){

				 ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
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

				<?php 
					}
				 ?>
			</div>
		</div>
		<div class="text-center my-3">
		<?php 
			if(!isset($_GET['id'])){
				$sql_total_items = "SELECT COUNT(*) AS total FROM sanpham";
			}else{
				$sql_total_items = "SELECT COUNT(*) AS total FROM sanpham where maloaisp = '".$_GET['id']."' ";

			}
		  
		  $query_total_items = mysqli_query($mysqli, $sql_total_items);
		  $total_items = mysqli_fetch_assoc($query_total_items)['total'];
		  if($total_items==0){
		  	echo "không có sản phẩm ở danh mục này";
		  }
		  $total_pages = ceil($total_items / $items_per_page);
		  //trang trước

		  //echo"khôi";
		  if($page > 1){  
		      $prev = ($page - 1);  
		      echo "<a href='index.php?action=quanlysanpham&query=them&page=$prev'><button class='btn btn-primary'><i class='bi bi-arrow-left'></i></button></a>&nbsp;";  
		      }  
		  for ($i = 1; $i <= $total_pages; $i++) {
		  	if($i==$page){
		  		echo "<a class='btn btn-primary text-dark' href='index.php?action=quanlysanpham&query=them&page=$i'>$i</a> ";
		  	}else{
		  		echo "<a class='btn btn-primary' href='index.php?action=quanlysanpham&query=them&page=$i'>$i</a> ";
		  	}
		    
		  }
		  //trang tiếp theo
		  if($page < $total_pages){  
		      $next = ($page + 1);  
		      echo "<a href='index.php?action=quanlysanpham&query=them&page=$next'><button class='btn btn-primary'><i class='bi bi-arrow-right'></i></button></a>";  
		      }  
		      //echo "</center>";
		?>
</div>
	</section>