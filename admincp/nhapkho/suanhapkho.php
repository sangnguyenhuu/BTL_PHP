<link rel="stylesheet" type="text/css" href="css/table.css">

    
<?php
        $idnhapkho=$_GET['idnhapkho'];
        $sql="select * from nhapkho where Manhapkho='".$_GET['idnhapkho']."'";
         $rows=mysqli_query($conn,$sql);
         $row=mysqli_fetch_array($rows);
?>

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Sửa Nhập Kho </td>
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
                <td>Mã nhân viên</td><td><input type="text" name="manhanvien"  value="<?php echo $row['Manhanvien'] ?>"/></td>
            </tr>
            <tr>
                <td>Mã NCC</td><td><input type="text" name="mancc"  value="<?php echo $row['MaNCC'] ?>" readonly/></td>
            </tr>

            <tr>
                <td colspan=2 class="input"> <input type="submit" name="update" value="Update" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table>  

</form>

  <?php

    if(isset($_POST['update'])){
        $trangthaitt=$_POST['trangthaitt'];
        $manhanvien=$_POST['manhanvien'];
        $mancc=$_POST['mancc'];
        $idnhapkho = $_GET['idnhapkho'];

    $sql=("
        UPDATE nhapkho SET
                            Trangthaitt='$trangthaitt',
                            Manhanvien='$manhanvien',
                            MaNCC='$mancc'
                            where Manhapkho='$idnhapkho'
    ");
    $update=mysqli_query($conn,$sql);
    if($update)
    {
        echo "<script>window.location.href='?admin=nhapkho';</script>";
    }
    else {
        echo "Sua loi";

    }
}
    
?>