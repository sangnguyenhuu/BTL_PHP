<?php
$delete = "delete from loaidactrung where Maloaidactrung='{$_GET['idloaidactrung']}'";
$del = mysqli_query($conn,$delete);
if ($del)
	//echo "thanh cong";
    echo "<script>window.location.href='?admin=loaidactrung';</script>";
	else
	echo "Xóa thất bại";
?>