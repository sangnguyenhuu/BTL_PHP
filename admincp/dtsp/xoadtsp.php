<?php
$delete = "delete from dtsp where Madtsp='{$_GET['iddtsp']}'";
$del = mysqli_query($conn,$delete);
if ($del)
	//echo "thanh cong";
    echo "<script>window.location.href='?admin=dtsp';</script>";
	else
	echo "Xóa thất bại";
?>