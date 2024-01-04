<link rel="stylesheet" type="text/css" href="css/table.css">

    
<?php
        $idsp=$_GET['idsp'];
        $sql="select * from sanpham where Masp='".$_GET['idsp']."'";
         $rows=mysqli_query($conn,$sql);
         $row=mysqli_fetch_array($rows);
?>

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Sửa Sản Phẩm </td>
            </tr>
            <tr>
                <td>Mã loại SP</td>
                <td>
                    <select name="maloaisp">
                    <?php
                    echo '<option value="'.$row["Maloaisp"].'">'.$row["Maloaisp"].'</option>';
                    $sql_sanpham = mysqli_query($conn,"SELECT * FROM loaisp");

                        $str = "";
                        while ($rows = mysqli_fetch_array($sql_sanpham)) {
                            $str = $str . 
                            '<option value="'.$rows["Maloaisp"].'">'.$rows["Maloaisp"].'-'.$rows["Tenloaisp"].'</option>';
                        }
                        echo $str;
                    ?>
                    </select> 
                </td>
            </tr>            
            <tr>
                <td>Tên SP</td><td><input type="text" name="tensp" value="<?php echo $row['Tensp'] ?>"/></td>
            </tr>
            <tr>
                <td>Số lượng</td><td><input type="text" name="soluong"  value="<?php echo $row['Soluong'] ?>"/></td>
            </tr>
            <tr>
                <td>Đơn giá nhập</td><td><input type="text" name="gianhap"  value="<?php echo $row['Dongianhap'] ?>"/></td>
            </tr>
            <tr>
                <td>Đơn giá bán</td><td><input type="text" name="giaban"  value="<?php echo $row['Dongiaban'] ?>"/></td>
            </tr>
            <tr>
                <td>Hình ảnh</td><td><input type="file" name="hinhanh"  value=""/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="update" value="Update" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

  <?php

    if(isset($_POST['update'])){
        $maloaisp=$_POST['maloaisp'];
        $tensp=$_POST['tensp'];
        $soluong=$_POST['soluong'];
        $gianhap=$_POST['gianhap'];
        $giaban=$_POST['giaban'];
        $file = $_FILES["hinhanh"];
        $filename = $file["name"]; // Tên tệp
        $temp_path = $file["tmp_name"];
        $idsp = $_GET['idsp'];

    $sql=("
        UPDATE sanpham SET
                            Maloaisp='$maloaisp',
                            Tensp='$tensp',
                            Soluong='$soluong',
                            Dongianhap='$gianhap',
                            Dongiaban='$giaban',
                            Hinhanh='$filename'
                            where Masp=$idsp
    ");
    $update=mysqli_query($conn,$sql);
    if($update)
    {        
        move_uploaded_file($temp_path, "HinhanhSP/" . $filename);
        echo "<script>window.location.href='?admin=sanpham';</script>";
    }
    else {
        echo "Sua san pham loi";
    }
}
    
?>