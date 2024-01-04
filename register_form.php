<?php

@include 'config/config.php';

if(isset($_POST['submit'])){

    $tendangnhap = mysqli_real_escape_string($mysqli, $_POST['tendangnhap']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $diachi = $_POST['diachi'];
    $gioitinh = $_POST['gioitinh'];
    $sodienthoai = $_POST['sdt'];




    $select = "Select * from taikhoan where Tendangnhap  ='$tendangnhap' && Matkhau ='$pass'";

    $result = mysqli_query($mysqli, $select);

    if(mysqli_num_rows($result) > 0){
        
        $error[] = 'User đã tồn tại';

    }else{
        if( $pass != $cpass){
            $error[] = 'password không khớp';
        }else{
            $insert ="insert into taikhoan (Tendangnhap, Matkhau , Hoten, Diachi , Gioitinh, SDT) values('$tendangnhap', '$pass', '$name', '$diachi', '$gioitinh', '$sodienthoai')";
            mysqli_query($mysqli, $insert);
            header('location:login_form.php');
        }
    }

};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    <!-- Link css  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <div class="form-container">
    <form action="" method="post">
        <h3>Đăng ký</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <input type = "text" name="tendangnhap" required placeholder="Nhập tên đăng nhập của bạn">
        <input type = "password" name="password" required placeholder="Nhập mật khẩu của bạn">
        <input type = "password" name="cpassword" required placeholder="Xác nhận mật khẩu của bạn">

        <input type = "text" name="name" required placeholder="Nhập tên của bạn">
        <input type = "text" name="diachi"  placeholder="Nhập địa chỉ của bạn">
        <input type = "text" name="gioitinh"  placeholder="Nhập giới tính của bạn">
        <input type = "number" name="sdt"  placeholder="Nhập số điện thoại của bạn">


        <input type="submit" name="submit" value="register now" class = "form-btn">
        <p>Bạn đã có tài khoản? <a href="login_form.php">Đăng nhập ngay</a></p>
    </form>
   </div>
</body>
</html>