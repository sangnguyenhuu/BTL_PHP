<link rel="stylesheet" type="text/css" href="css/table.css">

    
<?php
        $iddactrung=$_GET['iddactrung'];
        $sql="select * from dactrung where Madactrung='".$_GET['iddactrung']."'";
         $rows=mysqli_query($conn,$sql);
         $row=mysqli_fetch_array($rows);
?>

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Sửa Đặc Trưng </td>
            </tr>
            <tr>
                <td>Mã loại ĐT</td>
                <td>
                    <select name="maloaidactrung">
                    <?php
                    echo '<option value="'.$row["Maloaidactrung"].'">'.$row["Maloaidactrung"].'</option>';
                    $sql_sanpham = mysqli_query($conn,"SELECT * FROM loaidactrung");

                        $str = "";
                        while ($rows = mysqli_fetch_array($sql_sanpham)) {
                            $str = $str . 
                            '<option value="'.$rows["Maloaidactrung"].'">'.$rows["Maloaidactrung"].'-'.$rows["Tenloaidactrung"].'</option>';
                        }
                        echo $str;
                    ?>
                    </select> 
                </td>
            </tr>            
            <tr>
                <td>Tên đặc trưng</td><td><input type="text" name="tendactrung" value="<?php echo $row['Tendactrung'] ?>"/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="update" value="Update" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

  <?php

    if(isset($_POST['update'])){
        $maloaidactrung=$_POST['maloaidactrung'];
        $tendactrung=$_POST['tendactrung'];
        $iddactrung = $_GET['iddactrung'];

    $sql=("
        UPDATE dactrung SET
                            Maloaidactrung='$maloaidactrung',
                            Tendactrung='$tendactrung'
                            where Madactrung=$iddactrung
    ");
    $update=mysqli_query($conn,$sql);
    if($update)
    {
        echo "<script>window.location.href='?admin=dactrung';</script>";
    }
    else {
        echo "Sua loi";
    }
}
    
?>