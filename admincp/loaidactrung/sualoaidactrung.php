<link rel="stylesheet" type="text/css" href="css/table.css">

    
<?php
        $idloaidactrung=$_GET['idloaidactrung'];
        $sql="select * from loaidactrung where Maloaidactrung='".$_GET['idloaidactrung']."'";
         $rows=mysqli_query($conn,$sql);
         $row=mysqli_fetch_array($rows);
?>

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Sửa Loại Đặc Trưng</td>
            </tr>
            <tr>
                <td>Tên loại đặc trưng </td><td><input type="text" name="tenloaidactrung"  value="<?php echo $row['Tenloaidactrung'] ?>"/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="update" value="Update" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

  <?php

    if(isset($_POST['update'])){
        $tenloaidactrung=$_POST['tenloaidactrung'];
        $idloaidactrung = $_GET['idloaidactrung'];

    $sql=("
        UPDATE loaidactrung SET
                            Tenloaidactrung='$tenloaidactrung'
                            where Maloaidactrung=$idloaidactrung
    ");
    $update=mysqli_query($conn,$sql);
    if($update)
    {
        echo "<script>window.location.href='?admin=loaidactrung';</script>";
    }
    else {
        echo "Sua loi";
    }
}
    
?>