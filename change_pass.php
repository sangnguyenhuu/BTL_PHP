<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <link rel="stylesheet" href="styles.css">
</head>
<style>
   body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.container {
  width: 400px;
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.password-form {
  display: flex;
  flex-direction: column;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

.input-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="password"] {
  width: 100%;
  padding: 8px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

button {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #0056b3;
}

</style>

<body>
  <div class="container">
    <form action="#" method="post" class="password-form">
      <h2>Change Password</h2>
      <div class="input-group">
        <label for="current-password">Current Password</label>
        <input type="password" id="current-password" name="current_password" required>
      </div>
      <div class="input-group">
        <label for="new-password">New Password</label>
        <input type="password" id="new-password" name="new_password" required>
      </div>
      <div class="input-group">
        <label for="confirm-password">Confirm New Password</label>
        <input type="password" id="confirm-password" name="confirm_password" required>
      </div>
      <button name="submit">Change Password</button>
    </form>
  </div>
</body>
</html>
<?php

@include 'admincp/conn.php';

session_start();
$tentk = $_SESSION['user_tentk'];
$mk = $_SESSION['user_mk'];
$matk = $_SESSION['user_ma'];

       if(isset($_POST['submit'])){
         $newpass=md5($_POST['new_password']);
         $cfpass=md5($_POST['confirm_password']);
         if($mk == md5($_POST['current_password']) && $newpass == $cfpass){

         $sql=("
              UPDATE taikhoan SET
                                  Matkhau='$newpass'
                                  where Mataikhoan=$matk
          ");
         $update=mysqli_query($conn,$sql);
         if($update)
          {    
            echo "<script>window.location.href='logout.php';</script>";
          }
         else{
            echo "Đổi mật khẩu lỗi";  
          }
       }else{
         echo "Mật khẩu cũ không chính xác hoặc xác nhận mật khẩu sai";
       }
   }

?>