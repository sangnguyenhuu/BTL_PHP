<?php
	if(!isset($_SESSION['user_ma'])){
		header('location:login_form.php');
	}

	$id = $_GET['id'];
	$chitiet = "SELECT Tensp,Hinhanh,chitietdondat.Soluong,giadon FROM sanpham join chitietdondat on sanpham.Masp = chitietdondat.Masanpham WHERE Madondat = '".$id."'";
	$dh = mysqli_query($mysqli,$chitiet);
?>
<div class="wrap-table-shopping-cart">
			<table class="table-shopping-cart">
				<tbody id="display">
					<tr class="table_head">
						<th class="column-1" > Ten san pham </th>
						<th class="column-3" > Hinh anh </th>
						<th class="column-3" > So luong </th>
						<th class="column-3" > Gia </th>
					</tr>
					<?php
					$tongsl = 0;
					$tongtien = 0;
					while($row = mysqli_fetch_array($dh)) {
						$tongsl += $row['Soluong'];
						$tongtien += $row['giadon']*$row['Soluong'];
					?>
					<tr class="table_row">
						<th class="column-1" > <?php echo $row["Tensp"] ?> </th>
						<th class="column-3" > <img style="width: 150px; height: 150px;" src="admincp/HinhanhSP/<?php echo $row['Hinhanh']; ?>" alt="IMG-PRODUCT"> </th>
						<th class="column-3" > <?php echo $row['Soluong'] ?> </th>
						<th class="column-3" > <?php echo number_format($row['giadon']); ?> VND</th>
					</tr>
					<?php } ?>
					<tr class="table">
						<th class="column-1" > Tong</th>
						<th class="column-3" > </th>
						<th class="column-3" > <?=$tongsl ?> </th>
						<th class="column-3" > <?=number_format($tongtien); ?> VND</th>
					</tr>
				</tbody>
			</table>
</div>
<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
			<div class="flex-w flex-m m-r-20 m-tb-5">
				<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" id="coupon" placeholder="Coupon Code" value="@tk" >

				<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
				<a asp-controller="Home" asp-action="LichSuDonHang"> Lich Su Don Hang </a>	
				</div>
			</div>

			<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
				Update Cart
			</div>
			<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
				Delete Cart
			</div>
		</div>
