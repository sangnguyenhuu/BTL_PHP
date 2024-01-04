<?php 

@include 'config/config.php';

session_start();



if(isset($_SESSION['user_name']) ){
    $a = $_SESSION['user_ma'];
    

    $select = "select Tendangnhap, Loaitaikhoan, Hoten, Diachi, Gioitinh, SDT from taikhoan where Mataikhoan = '$a' ";
    $result = mysqli_query($mysqli, $select);
    $rs = mysqli_fetch_array($result);
    $tendangnhap = $rs['Tendangnhap'];
    $loaitaikhoan = $rs['Loaitaikhoan'];
    $hoten = $rs['Hoten'];
    $diachi = $rs['Diachi'];
    $gioitinh = $rs['Gioitinh'];
    $sdt = $rs['SDT'];
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
      <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <div class="container">
        <div class="content">
        <h1>Thông tin tài khoản của bạn</h1>
        <h3>Tên đăng nhập : <span><?php echo $tendangnhap ?></span> </h3>
        <h3>Loại tài khoản : <span><?php echo $loaitaikhoan ?></span> </h3>
        <h3>Họ tên : <span><?php echo $hoten ?> </h3>
        <h3>Địa chỉ : <span><?php echo $diachi ?> </h3>
        <h3>Giới tính : <span><?php echo $gioitinh ?> </h3>
        <h3>Số điện thoại : <span><?php echo $sdt ?> </h3>
       

        <button><a style="font-size : 20px" href="editpro_form.php">Chỉnh sửa thông tin </a></button>
        <br>
        <button><a style="font-size : 20px" href="change_pass.php">Đổi mật khẩu </a></button>
        <br>
        <button><a style="font-size : 20px" href="index.php?quanly=donhang">Lich su don hang </a></button>
        <br>
        <button><a style="font-size : 20px" href="#">Trang chủ </a></button>

        </div>

    </div>
    
</body>
</html>