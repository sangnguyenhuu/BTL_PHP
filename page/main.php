<?php 
	if(isset($_GET['quanly'])){
		$tam = $_GET['quanly'];
		switch ($tam) {
			//index.php?quanly=chitietsanpham
			case 'chitietsanpham': include('page/productdetails.php'); break;
			case 'timkiem': 
				//include('page/slider.php');
				//include('page/banner.php');
				include('page/search.php'); 
				break;
			case 'giohang': include('page/cart.php'); break;
			case 'donhang': include('page/donhang.php'); break;
			case 'chitietdonhang': include('page/orderdetails.php'); break;
			case 'shop':include('page/shop.php'); break;
			case 'contact':include('page/contact.php'); break;
			
			default:
				// code...
				break;
		}
	}
	else{
		require('slider.php');
		require('banner.php');
		require('products.php');
	}
 ?>