<?php
$delete = "delete from dondat where Madondat='{$_GET['iddd']}'";
$del = mysqli_query($conn,$delete);
if ($del)
	//echo "thanh cong";
    echo "<script>window.location.href='?admin=dondat';</script>";
	else
	echo "Xóa người dùng thất bại";
?>