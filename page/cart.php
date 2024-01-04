<?php
	if(!isset($_SESSION['cart'])){
		$_SESSION["cart"] = array();
	}

	$tk="";

	if(isset($_SESSION["user_ma"])){
		$tk = "SELECT * FROM `taikhoan` WHERE `Mataikhoan` = ".$_SESSION["user_ma"];
		$tk = mysqli_query($mysqli,$tk);
		$tk = mysqli_fetch_array($tk);
	}

	$error = false;
	$errorName = $errorAddress = $errorPhone =$errorG = "";

	if(isset($_GET['action'])){
		function update_cart($add = false){
			foreach ($_POST['quantity'] as $id => $quantity) {
				if($quantity == 0){
					unset($_SESSION['cart'][$id]);
				}else{
					if($add){
						$_SESSION['cart'][$id] += $quantity;
					}else{
						$_SESSION['cart'][$id] = $quantity;
					}
				}
			}
		}

		switch ($_GET['action']){
			case "add": 
				//update_cart(true);
				foreach ($_POST['quantity'] as $id => $quantity) {
						if(isset($_SESSION['cart'][$id])){
							$_SESSION['cart'][$id] += $quantity;
						}else{
							$_SESSION['cart'][$id] = $quantity;
						}
						
				}
				break;

			case "delete":
				if(isset($_GET['id']))
				{
					unset($_SESSION['cart'][$_GET['id']]);
				}

				ob_end_clean();
				header("Location: ./index.php?quanly=giohang");
				break;

			case "submit":
				if(isset($_POST["update_click"]))
				{
					//update_cart();
					foreach ($_POST['quantity'] as $id => $quantity) {
						if($quantity == 0){
							unset($_SESSION['cart'][$id]);
						}else{
							$_SESSION['cart'][$id] = $quantity;
						}
					}

					ob_end_clean();
					header("Location: ./index.php?quanly=giohang");
				}
				elseif(isset($_POST["order_click"])){
					if(!isset($_SESSION["user_ma"])){
						header('location:login_form.php');
					}
					//var_dump($_POST);
					if(empty($_POST["name"])){
						$errorName = "<span style='color:red;'>Error: Ban chua nhap ten.</span>";
						$error = true;
					}else{
						$fullname = $_POST["name"];
        				if(!preg_match("/^[a-zA-Zàáảãạâầấẩẫậăằắẳẵặèéẹêềếểễệđìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳỷỹý\s]*$/u",$fullname)) {
            				$errorName = "<span style='color:red;'>Error: Họ tên chỉ chấp nhận chữ và khoảng trắng.</span>";
            				$error = true;
						}else if(strlen($fullname) < 3){
							$errorName = "<span style='color:red;'>Error: Họ tên phai lon hon 3 ky tu.</span>";
							$error = true;
						}
					}

					if(empty($_POST["address"])){
						$errorAddress = "<span style='color:red;'>Bạn chưa nhập địa chỉ người nhận</span>";
						$error = true;
					}else{
						if(!preg_match("/^[a-zA-Z0-9\s\.,#-]{6,}+$/",$_POST["address"])) {
            				$errorAddress = "<span style='color:red;'>Xem lai địa chỉ người nhận</span>";
							$error = true;
						}
					}

					if(empty($_POST["phone"])){
						$errorPhone = "<span style='color:red;'>Bạn chưa nhập số điện thoại</span>";
						$error = true;
					}else{
						if(!preg_match("/^[0-9]{10,11}+$/",$_POST["phone"])) {
            				$errorPhone = "<span style='color:red;'>Xem lai số điện thoại</span>";
							$error = true;
						}
					}

					if(empty($_POST["quantity"])){
						$errorG = "<span style='color:red;'>Giỏ hàng rỗng</span>";
						$error = true;
					}

					if($error == false && !empty($_POST["quantity"])){
						$products = "SELECT * FROM `sanpham` WHERE `Masp` IN (".implode(",", array_keys($_POST['quantity'])).")";
						$products = mysqli_query($mysqli,$products);
						$total = 0;
						$orderProduct = array();

						//Them don dat
						while ($row =mysqli_fetch_array($products)) {
							$orderProduct[] = $row;
							$total += $row["Dongiaban"] * $_POST["quantity"][$row["Masp"]];
						}
						 $date = date("YmdHis",time());
						$qr = "INSERT INTO `dondat` (`Madondat`,`Thoigian`, `name`, `address`, `phone`, `total`,`Loaidondat`, `Trangthaitt`, `Manhanvien`, `Makhachhang`) VALUES (NULL, '".$date."', '".$_POST['name']."', '".$_POST['address']."', '".$_POST['phone']."','".$total."' ,'Dat', 1 , '0', ".$_SESSION['user_ma'].")";
						$insertOrder = mysqli_query($mysqli,$qr);
						
						$orderId = $mysqli->insert_id;
						
						//Them chi tiet don dat
						$insertString = "";
						foreach($orderProduct as $key => $product) {
							$insertString .= "(NULL, '".$_POST["quantity"][$product["Masp"]]."', '".$product["Dongiaban"]."','".$orderId."', '".$product["Masp"]."')";
							if($key != count($orderProduct) -1){
								$insertString .= ",";
							}
						}
						$qr = "INSERT INTO `chitietdondat` (`Machitietdondat`, `Soluong`,`giadon`, `Madondat`, `Masanpham`) VALUES ".$insertString.";";
						$insertOrder = mysqli_query($mysqli,$qr);
						
						foreach ($_POST['quantity'] as $id => $quantity) {
							unset($_SESSION['cart'][$id]);
						}
					}
				}
				break;
		}
	}

	if(!empty($_SESSION["cart"])){
		$sql_sp = "SELECT * FROM `sanpham` WHERE `Masp` IN (".implode(",", array_keys($_SESSION["cart"])).")";
		$query_sp = mysqli_query($mysqli, $sql_sp);

	}
?>

<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
	<?php echo !empty($errorG)?$errorG:"";?>
<form class="bg0 p-t-75 p-b-85" action="index.php?quanly=giohang&action=submit" method="POST">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tbody><tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

								<?php
									if(!empty($query_sp)){
									$total = 0;
									while ($row =mysqli_fetch_array($query_sp)) { 
								?>

								<tr class="table_row">
									<td class="column-1">
										<a class="how-itemcart1" href="index.php?quanly=giohang&action=delete&id=<?=$row["Masp"]?>">
											<img src="admincp/HinhanhSP/<?php echo $row['Hinhanh'] ?>" alt="IMG">
										</a>
									</td>
									<td class="column-2"><?=$row['Tensp']?></td>
									<td class="column-3"><?=number_format($row['Dongiaban']) ?> VNĐ</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity[<?=$row['Masp']?>]" value="<?=$_SESSION['cart'][$row['Masp']]?>" max='<?=$row['Soluong']?>'>

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5"><?=number_format($row['Dongiaban'] * $_SESSION['cart'][$row['Masp']]) ?> VNĐ</td>
								</tr>

								<?php $total +=  $row['Dongiaban'] * $_SESSION['cart'][$row['Masp']]; }}?>

							</tbody>
						<?php if(empty($query_sp)){?>
							<tfoot>
								<tr class="table_row">
								<th class="column-3" colspan="9" style="text-align: center;">Chua co  don hang nao</th>
								</tr>
							</tfoot>
						<?php } ?>
						</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<!-- <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div> -->
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								<input style="background-color: rgba(0, 0, 0, 0);" type="submit" name="update_click" value="Update Cart">
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>
						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Không có phương thức vận chuyển có sẵn. Vui lòng kiểm tra lại địa chỉ của bạn hoặc liên hệ với chúng tôi nếu bạn cần bất kỳ trợ giúp nào.
								</p>	
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Name" value="<?=!empty($tk["Hoten"])?$tk["Hoten"]:""; ?>">	
									</div>
									<?php echo !empty($errorName)?$errorName:""; ?>
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Address" value="<?=!empty($tk["Diachi"])?$tk["Diachi"]:""; ?>">
									</div>
									<?php echo !empty($errorAddress)?$errorAddress:""; ?>
									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Phone number" value="<?=!empty($tk["SDT"])?$tk["SDT"]:""; ?>">
									</div>
									<?php echo !empty($errorPhone)?$errorPhone:""; ?>
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?= !empty($total)?number_format($total):"0"?> VNĐ
								</span>
							</div>
						</div>

						<button type="submit" name = "order_click" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>