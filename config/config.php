<?php 
$mysqli = new mysqli("localhost","root","","qldienthoai");

// Check connection
if ($mysqli->connect_errno) {
  echo "kết nối mysqli lỗi " . $mysqli->connect_error;
  exit();
}
 ?>