<?php
$delete = "delete from chitietsp where Machitietsp='{$_GET['idchitietsp']}'";
$del = mysqli_query($conn,$delete);
if ($del)
	//echo "thanh cong";
    echo "<script>window.location.href='?admin=chitietsp';</script>";
	else
	echo "Xóa thất bại";
?>