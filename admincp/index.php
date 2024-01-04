<?php

@include 'config.php';

session_start();

$idnv = $_SESSION['admin_ma'];
if(!isset($_SESSION['admin_name'])){
   header('location:../login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body class="animsition">

	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->


			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="#" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.php" >Home</a>
							</li>

							<li>
								<a href="?admin=doanhthu">Doanh Thu</a>
							</li>

							<li>
								<a href="../logout.php">Logout</a>
							</li>
						</ul>
					</div>

				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
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


			<ul class="main-menu-m">
				<li>
					<a href="index.php">Home</a>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

	</header>



	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
				<a asp-controller="admin" asp-action="Index"> QUAN TRI VIEN WEB </a>	
				</h3>


	<!-- Banner -->
<?php
    include("conn.php");

if(isset($_GET['admin']))
	switch($_GET['admin'])
	{
		case 'sanpham': 	include ("sanpham/sanpham.php");		break;
		case 'themsp': 		include ("sanpham/themsp.php");			break;
		case 'suasp':		include ("sanpham/suasp.php");			break;
		case 'xoasp':		include ("sanpham/xoasp.php");			break;
		case 'timkiemsp':	include ("sanpham/timkiemsp.php");		break;

		case 'dtsp': 		include ("dtsp/dtsp.php");				break;
		case 'themdtsp': 	include ("dtsp/themdtsp.php");			break;
		case 'suadtsp': 	include ("dtsp/suadtsp.php");			break;
		case 'xoadtsp': 	include ("dtsp/xoadtsp.php");			break;
		case 'timkiemdtsp': include ("dtsp/timkiemdtsp.php");		break;

		case 'loaisp': 			include ("loaisp/loaisp.php");			break;
		case 'themloaisp': 		include ("loaisp/themloaisp.php");		break;
		case 'sualoaisp': 		include ("loaisp/sualoaisp.php");		break;
		case 'xoaloaisp': 		include ("loaisp/xoaloaisp.php");		break;
		case 'timkiemloaisp': 	include ("loaisp/timkiemloaisp.php");	break;

		case 'loaidactrung': 		include ("loaidactrung/loaidactrung.php");			break;
		case 'themloaidactrung': 	include ("loaidactrung/themloaidactrung.php");		break;
		case 'sualoaidactrung': 	include ("loaidactrung/sualoaidactrung.php");		break;
		case 'xoaloaidactrung': 	include ("loaidactrung/xoaloaidactrung.php");		break;
		case 'timkiemloaidactrung': include ("loaidactrung/timkiemloaidactrung.php");	break;

		case 'dactrung': 			include ("dactrung/dactrung.php");			break;
		case 'themdactrung': 		include ("dactrung/themdactrung.php");		break;
		case 'suadactrung': 		include ("dactrung/suadactrung.php");		break;
		case 'xoadactrung': 		include ("dactrung/xoadactrung.php");		break;
		case 'timkiemdactrung': 	include ("dactrung/timkiemdactrung.php");	break;


		case 'dondat':		include ("dondat/dondat.php");		break;
		case 'themdd':		include ("dondat/themdd.php");		break;
		case 'suadd':		include ("dondat/suadd.php");		break;
		case 'xoadd':		include ("dondat/xoadd.php");		break;
		case 'timkiemdd':	include ("dondat/timkiemdd.php");	break;

		case 'chitietdd':			include ("chitietdondat/chitietdd.php");			break;
		case 'timkiemchitietdd':	include ("chitietdondat/timkiemchitietdd.php");		break;

		case 'chitietsp': 			include ("chitietsp/chitietsp.php");			break;
		case 'themchitietsp': 		include ("chitietsp/themchitietsp.php");		break;
		case 'suachitietsp': 		include ("chitietsp/suachitietsp.php");			break;
		case 'xoachitietsp': 		include ("chitietsp/xoachitietsp.php");			break;
		case 'timkiemchitietsp': 	include ("chitietsp/timkiemchitietsp.php");		break;

		case 'nhapkho':			include ("nhapkho/nhapkho.php");			break;
		case 'themnhapkho':		include ("nhapkho/themnhapkho.php");		break;
		case 'suanhapkho':		include ("nhapkho/suanhapkho.php");			break;
		case 'xoanhapkho':		include ("nhapkho/xoanhapkho.php");			break;
		case 'timkiemnhapkho':	include ("nhapkho/timkiemnhapkho.php");		break;

		case 'chitietnhapkho':			include ("chitietnhapkho/chitietnhapkho.php");			break;
		case 'themchitietnhapkho':		include ("chitietnhapkho/themchitietnhapkho.php");		break;
		case 'suachitietnhapkho':		include ("chitietnhapkho/suachitietnhapkho.php");		break;
		case 'xoachitietnhapkho':		include ("chitietnhapkho/xoachitietnhapkho.php");		break;
		case 'timkiemchitietnhapkho':	include ("chitietnhapkho/timkiemchitietnhapkho.php");	break;

		case 'taikhoan':		include ("taikhoan/taikhoan.php");			break;
		case 'suataikhoan':		include ("taikhoan/suataikhoan.php");		break;
		case 'xoataikhoan':		include ("taikhoan/xoataikhoan.php");		break;
		case 'timkiemtaikhoan':	include ("taikhoan/timkiemtaikhoan.php");	break;

		case 'doanhthu':	include ("doanhthu/doanhthu.php");	break;
		case 'baohanh':	include ("baohanh/baohanh.php");	break;

		default:			include ("sanpham.php");		break;
	}
	else 
	{
		include ("admin.php");
	}
?>


	<!--End  Banner -->

			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shoes
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Watches
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function () {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function () { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function (e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function () {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function () {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function () {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function () {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function () {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function () {
				swal(nameProduct, "is added to cart !", "success");
			});
		});

	</script>
	<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function () {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function () {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>


