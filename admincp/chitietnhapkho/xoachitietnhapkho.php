<?php
$delete = "delete from chitietnhapkho where Machitietnhap='{$_GET['idchitietnhap']}'";
$del = mysqli_query($conn,$delete);
if ($del)
	//echo "thanh cong";
    echo "<script>window.location.href='?admin=chitietnhapkho';</script>";
	else
	echo "Xóa thất bại";
?>