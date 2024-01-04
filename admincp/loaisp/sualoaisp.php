<link rel="stylesheet" type="text/css" href="css/table.css">

    
<?php
        $idloaisp=$_GET['idloaisp'];
        $sql="select * from loaisp where Maloaisp='".$_GET['idloaisp']."'";
         $rows=mysqli_query($conn,$sql);
         $row=mysqli_fetch_array($rows);
?>

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Sửa Loại Sản Phẩm </td>
            </tr>
            <tr>
                <td>Tên loại sản phẩm </td><td><input type="text" name="tenloaisp"  value="<?php echo $row['Tenloaisp'] ?>"/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="update" value="Update" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

  <?php

    if(isset($_POST['update'])){
        $tenloaisp=$_POST['tenloaisp'];
        $idloaisp = $_GET['idloaisp'];

    $sql=("
        UPDATE sanpham SET
                            Tenloaisp='$tenloaisp'
                            where Maloaisp=$idloaisp
    ");
    $update=mysqli_query($conn,$sql);
    if($update)
    {
        echo "<script>window.location.href='?admin=loaisp';</script>";
    }
    else {
        echo "Sua loi";
    }
}
    
?>