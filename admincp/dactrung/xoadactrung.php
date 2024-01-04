<?php
$delete = "delete from dactrung where Madactrung='{$_GET['iddactrung']}'";
$del = mysqli_query($conn,$delete);
if ($del)
	//echo "thanh cong";
    echo "<script>window.location.href='?admin=dactrung';</script>";
	else
	echo "Xóa thất bại";
?>