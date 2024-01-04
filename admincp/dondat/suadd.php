<link rel="stylesheet" type="text/css" href="css/table.css">

    
<?php
        $iddd=$_GET['iddd'];
        $sql="select * from dondat where Madondat='".$_GET['iddd']."'";
         $rows=mysqli_query($conn,$sql);
         $row=mysqli_fetch_array($rows);
?>

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Sửa Đơn Đặt </td>
            </tr>
            <tr>
                <td>Loại đơn đặt</td><td><input type="text" name="loaidondat" value="<?php echo $row['Loaidondat'] ?>"/></td>
            </tr> 
            <tr>
                <td>Họ Tên</td><td><input type="text" name="name" value="<?php echo $row['name'] ?>"/></td>
            </tr>
            <tr>
                <td>Địa chỉ</td><td><input type="text" name="address" value="<?php echo $row['address'] ?>"/></td>
            </tr>
            <tr>
                <td>SDT</td><td><input type="text" name="phone" value="<?php echo $row['phone'] ?>"/></td>
            </tr>
            <tr>
                <td>Tổng tiền</td><td><input type="text" name="total" value="<?php echo $row['total'] ?>"/></td>
            </tr>                        
            <tr>
                <td>Thời gian</td><td><input type="text" name="thoigian" value="<?php echo $row['Thoigian'] ?>" readonly/></td>
            </tr>  
            <tr>
                <td>Trạng thái TT</td>
                <td>
                    <select name="trangthaitt">
                    <?php
                    echo ' <option value="'.$row["Trangthaitt"].'">'.$row["Trangthaitt"].'</option>';
                    echo '
                    <option value="1">1-Đang xử lý</option>
                    <option value="2">2-Đã xử lý</option>
                    <option value="3">3-Đã hoàn tất</option>
                    <option value="0">0-Hủy</option>
                    ';
                    ?>
                    </select> 
                </td>
            </tr>
            <tr>
                <td>Mã nhân viên</td>
                <td>
                    <select name="manhanvien">
                    <?php
                    echo ' <option value="'.$row["Manhanvien"].'">'.$row["Manhanvien"].'</option>';
                    echo '
                    <option value="'.$idnv.'">'.$idnv.'</option>
                    ';
                    ?>
                    </select> 
                </td>                
            </tr>
            <tr>
                <td>Mã khách hàng</td><td><input type="text" name="makhachhang"  value="<?php echo $row['Makhachhang'] ?>" readonly/></td>
            </tr>

            <tr>
                <td colspan=2 class="input"> <input type="submit" name="update" value="Update" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table>  

</form>

  <?php

    if(isset($_POST['update'])){
        $loaidondat=$_POST['loaidondat'];
        $name=$_POST['name'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $total=$_POST['total'];
        $thoigian=$_POST['thoigian'];
        $trangthaitt=$_POST['trangthaitt'];
        $manhanvien=$_POST['manhanvien'];
        $makhachhang=$_POST['makhachhang'];
        $iddd = $_GET['iddd'];

    $sql=("
        UPDATE dondat SET
                            Loaidondat='$loaidondat',
                            name='$name',
                            address='$address',
                            phone='$phone',
                            total='$total',
                            Thoigian='$thoigian',
                            Trangthaitt='$trangthaitt',
                            Manhanvien='$manhanvien',
                            Makhachhang='$makhachhang'
                            where Madondat='$iddd'
    ");
    $update=mysqli_query($conn,$sql);
    if($update)
    {
        echo "<script>window.location.href='?admin=dondat';</script>";
    }
    else {
        echo "Sua loi";

    }
}
    
?>