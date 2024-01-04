<link rel="stylesheet" type="text/css" href="css/table.css">

    
<?php
        $idchitietnhap=$_GET['idchitietnhap'];
        $sql="select * from chitietnhapkho where Machitietnhap='".$_GET['idchitietnhap']."'";
         $rows=mysqli_query($conn,$sql);
         $row=mysqli_fetch_array($rows);
?>

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Sửa Chi Tiết Nhập Kho </td>
            </tr>
            <tr>
                <td>Số lượng</td><td><input type="text" name="soluong" value="<?php echo $row['Soluong'] ?>"/></td>
            </tr>            
            <tr>
                <td>Mã nhập kho </td><td><input type="text" name="manhapkho" value="<?php echo $row['Manhapkho'] ?>"/></td>
            </tr>
            <tr>
                <td>Mã sản phẩm </td><td><input type="text" name="masanpham" value="<?php echo $row['Masanpham'] ?>"/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="update" value="Update" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

  <?php

    if(isset($_POST['update'])){
        $soluong=$_POST['soluong'];
        $manhapkho=$_POST['manhapkho'];
        $masanpham = $_POST['masanpham'];
        $idchitietnhap = $_GET['idchitietnhap'];


    $sql=("
        UPDATE chitietnhapkho SET
                            Soluong='$soluong',
                            Manhapkho='$manhapkho',
                            Masanpham='$masanpham'
                            where Machitietnhap=$idchitietnhap
    ");
    $update=mysqli_query($conn,$sql);
    if($update)
    {
        echo "<script>window.location.href='?admin=chitietnhapkho';</script>";
    }
    else {
        echo "Sua loi";
    }
}
    
?>