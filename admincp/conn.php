<?php

$servername = "localhost"; // Tên máy chủ cơ sở dữ liệu
$username = "root"; // Tên đăng nhập MySQL
$password = ""; // Mật khẩu MySQL
$dbname = "qldienthoai"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, $dbname);
//$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
    //exit();
}else{
}