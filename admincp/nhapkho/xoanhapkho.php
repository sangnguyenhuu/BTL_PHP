<?php
$delete = "delete from nhapkho where Manhapkho='{$_GET['idnhapkho']}'";
$del = mysqli_query($conn,$delete);
if ($del)
	//echo "thanh cong";
    echo "<script>window.location.href='?admin=nhapkho';</script>";
	else
	echo "Xóa thất bại";
?>