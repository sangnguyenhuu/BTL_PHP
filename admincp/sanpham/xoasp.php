<?php
$delete = "delete from sanpham where Masp='{$_GET['idsp']}'";
$del = mysqli_query($conn,$delete);
if ($del)
	//echo "thanh cong";
    echo "<script>window.location.href='?admin=sanpham';</script>";
	else
	echo "Xóa người dùng thất bại";
?>