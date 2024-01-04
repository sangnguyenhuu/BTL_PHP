<link rel="stylesheet" type="text/css" href="css/table.css">

    
<?php
        $idtaikhoan=$_GET['idtaikhoan'];
        $sql="select * from taikhoan where Mataikhoan='".$_GET['idtaikhoan']."'";
         $rows=mysqli_query($conn,$sql);
         $row=mysqli_fetch_array($rows);
?>

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Sửa Tài Khoản </td>
            </tr>          
            <tr>
                <td>Tên đăng nhập </td><td><input type="text" name="tendangnhap" value="<?php echo $row['Tendangnhap'] ?>"/></td>
            </tr>            
            <tr>
                <td>Mật khẩu</td><td><input type="text" name="matkhau"  value="<?php echo $row['Matkhau'] ?>"/></td>
            </tr>
            <tr>
                <td>Loại TK</td>
                <td>
                    <select name="loaitaikhoan">
                    <?php
                    echo ' <option value="'.$row["Loaitaikhoan"].'">'.$row["Loaitaikhoan"].'</option>';
                    echo '
                    <option value="KH">Khách Hàng</option>
                    <option value="NV">Nhân Viên</option>
                    <option value="NCC">Nhà Cung Cấp</option>
                    ';
                    ?>
                    </select> 
                </td>
            </tr>
            <tr>
                <td>Họ tên</td><td><input type="text" name="hoten"  value="<?php echo $row['Hoten'] ?>"/></td>
            </tr>
            <tr>
                <td>Địa chỉ</td><td><input type="text" name="diachi"  value="<?php echo $row['Diachi'] ?>"/></td>
            </tr>
            <tr>
                <td>Giới tính</td><td><input type="text" name="gioitinh"  value="<?php echo $row['Gioitinh'] ?>"/></td>
            </tr>
            <tr>
                <td>SDT</td><td><input type="text" name="sdt"  value="<?php echo $row['SDT'] ?>"/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="update" value="Update" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

  <?php

    if(isset($_POST['update'])){
        $tendangnhap=$_POST['tendangnhap'];
        $matkhau=$_POST['matkhau'];
        $loaitaikhoan=$_POST['loaitaikhoan'];
        $hoten=$_POST['hoten'];
        $diachi=$_POST['diachi'];
        $gioitinh=$_POST['gioitinh'];
        $sdt=$_POST['sdt'];
        $idchitietsp = $_GET['idchitietsp'];

    $sql=("
        UPDATE taikhoan SET
                            Tendangnhap='$tendangnhap',
                            Matkhau='$matkhau',
                            Loaitaikhoan='$loaitaikhoan',
                            Hoten='$hoten',
                            Diachi='$diachi',
                            Gioitinh='$gioitinh',
                            SDT='$sdt'
                            where Mataikhoan=$idtaikhoan
    ");
    $update=mysqli_query($conn,$sql);
    if($update)
        
    {
        echo "<script>window.location.href='?admin=taikhoan';</script>";
    }
    else {
        echo "Sua loi";
    }
}
    
?>