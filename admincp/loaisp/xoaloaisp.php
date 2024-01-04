<?php
$delete = "delete from loaisp where Maloaisp='{$_GET['idloaisp']}'";
$del = mysqli_query($conn,$delete);
if ($del)
	//echo "thanh cong";
    echo "<script>window.location.href='?admin=loaisp';</script>";
	else
	echo "Xóa thất bại";
?>