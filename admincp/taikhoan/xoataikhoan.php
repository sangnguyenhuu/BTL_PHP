<?php
$delete = "delete from taikhoan where Mataikhoan='{$_GET['idtaikhoan']}'";
$del = mysqli_query($conn,$delete);
if ($del)
	//echo "thanh cong";
    echo "<script>window.location.href='?admin=taikhoan';</script>";
	else
	echo "Xóa thất bại";
?>