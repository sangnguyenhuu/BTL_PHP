<?php 

session_start();

@include 'config/config.php';

$ma = $_SESSION['user_ma'];
    

$select = "select * from taikhoan where Mataikhoan = '$ma' ";
$result = mysqli_query($mysqli, $select);
$info = mysqli_fetch_assoc($result);

if(isset($_POST['update_profile'])){
    $hoten = $_POST['hoten'];
    $diachi = $_POST['diachi'];
    $gioitinh = $_POST['gioitinh'];
    $sdt = $_POST['sdt'];
   

    $sql = "update taikhoan set Hoten = '$hoten' , Diachi ='$diachi' , Gioitinh ='$gioitinh' , SDT ='$sdt'  where Mataikhoan = '$ma'";
    $result2 = mysqli_query($mysqli, $sql);

    if($result2){
        echo "Update thành công!";
    }else{
        echo "Update thất bại";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <!-- Link css  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <div class="form-container">
    <form action="" method="post">
        <h3>Thông tin tài khoản</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <div class="div_deg"></div>
        <div>
            <label>Họ tên : </label>
            <input type="text" name="hoten" value = "<?php echo "{$info['Hoten']}" ?>">
        </div>
        <div>
            <label>Địa chỉ : </label>
            <input type="text" name="diachi" value = "<?php echo "{$info['Diachi']}" ?>">
        </div>
        <div>
            <label>Giới tính: </label>
            <input type="text" name="gioitinh" value = "<?php echo "{$info['Gioitinh']}" ?>">
        </div>
        <div>
            <label>Số điện thoại : </label>
            <input type="number" name="sdt" value = "<?php echo "{$info['SDT']}" ?>">
        </div>
        
        
        <div>
            <input type = "submit" class="form-btn" name="update_profile" value ="Update"> 
        </div>
        <div>
        <button><a style="font-size : 20px" href="profile_user.php">Back </a></button>
        </div>
    </form>
   </div>
</body>