<?php
	$sl = 0;
	if(!isset($_SESSION['cart'])){
		$sl = 0;
	}else{
		$sl = count($_SESSION['cart']);
	}
?>
<!-- Header -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Miễn phí vận chuyển cho đơn hàng lớn hơn 20.000.000 VNĐ
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Hỗ trợ
						</a>
						<?php if(isset($_SESSION['user_name'])){ ?>
							<a href="profile_user.php" class="flex-c-m trans-04 p-lr-25">
								<?php echo $_SESSION['user_name'];?>

							</a>
							<a href="logout.php" class="flex-c-m trans-04 p-lr-25">
								Đăng xuất
							</a>
						<?php }else{?>
							<a href="login_form.php" class="flex-c-m trans-04 p-lr-25">
								Đăng nhập
							</a>
						<?php }?>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Trang chủ</a>
							</li>

							<li>
								<a href="index.php?quanly=shop">Của hàng</a>
							</li>

							<li class="label1" data-label1="hot">
								<a href="index.php?quanly=giohang">Giỏ hàng</a>
							</li>
							<li>
								<a href="index.php?quanly=contact">Liên hệ</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<a href="index.php?quanly=giohang" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?=$sl?>">

							<i class="zmdi zmdi-shopping-cart"></i>
						</a>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<a href="index.php?quanly=giohang" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?=$sl?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Miễn phí vận chuyển cho đơn hàng lớn hơn 20.000.000 VNĐ
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.php">Trang chủ</a>
				</li>

				<li>
					<a href="index.php?quanly=shop">Shop</a>
				</li>

				<li>
					<a href="index.php?quanly=giohang" class="label1 rs1" data-label1="hot">Features</a>
				</li>
				<li>
					<a href="index.php?quanly=contact">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form action="index.php?quanly=timkiem" method="POST" class="wrap-search-header flex-w p-l-15">
					<button type="submit" name="timkiem" class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search-product" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>