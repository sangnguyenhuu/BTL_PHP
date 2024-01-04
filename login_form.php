<?php

@include 'config/config.php';

session_start();

if(isset($_POST['submit'])){

   
   $tendangnhap = mysqli_real_escape_string($mysqli, $_POST['tendangnhap']);
   $pass = md5($_POST['password']);
  
   

   $select = "Select * from taikhoan where Tendangnhap  ='$tendangnhap' && Matkhau ='$pass'";

   $result = mysqli_query($mysqli, $select);

   if(mysqli_num_rows($result) > 0){ 

      $row = mysqli_fetch_array($result);

      if($row['Loaitaikhoan'] == 'NV'){

         $_SESSION['admin_name'] = $row['Hoten'];
         $_SESSION['admin_ma'] = $row['Mataikhoan'];

         header('location:admincp/index.php');

      }else if($row['Loaitaikhoan'] == 'KH'){

         $_SESSION['user_name'] = $row['Hoten'];
         $_SESSION['user_ma'] = $row['Mataikhoan'];
         $_SESSION['user_tentk'] = $row['Tentaikhoan'];
         $_SESSION['user_mk'] = $row['Matkhau'];

         header('location:index.php');

      }
             

   }else{
      $error[] = 'Tài khoản hoặc mật khẩu không chính xác!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- Link css  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <div class="form-container">
    <form action="" method="post">
        <h3>Đăng nhập</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <input type = "text" name="tendangnhap"  placeholder="Nhập tên đăng nhập của bạn">
        <input type = "password" name="password" required placeholder="Nhập mật khẩu của bạn">
       
        <input type="submit" name="submit" value="login now" class = "form-btn">
        <p>Bạn chưa có tài khoản? <a href="register_form.php">Đăng ký bây giờ </a></p>
    </form>
   </div>
</body>
</html>