<link rel="stylesheet" type="text/css" href="css/table.css">

    
<?php
        $iddtsp=$_GET['iddtsp'];
        $sql="select * from dtsp where Madtsp='".$_GET['iddtsp']."'";
         $rows=mysqli_query($conn,$sql);
         $row=mysqli_fetch_array($rows);
?>

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Sửa Đặc Trưng Sản Phẩm </td>
            </tr>
            <tr>
                <td>Mã SP</td>
                <td>
                    <select name="masp">
                    <?php
                    echo '<option value="'.$row["Masp"].'">'.$row["Masp"].'</option>';
                    $sql_sanpham = mysqli_query($conn,"SELECT * FROM sanpham");

                        $str = "";
                        while ($rows = mysqli_fetch_array($sql_sanpham)) {
                            $str = $str . 
                            '<option value="'.$rows["Masp"].'">'.$rows["Masp"].'-'.$rows["Tensp"].'</option>';
                        }
                        echo $str;
                    ?>
                    </select> 
                </td>
            </tr>            
            <tr>
                <td>Mã đặc trưng </td>
                <td>
                    <select name="madactrung">
                    <?php
                    echo '<option value="'.$row["Madactrung"].'">'.$row["Madactrung"].'</option>';
                    $sql_dactrung = mysqli_query($conn,"SELECT * FROM dactrung");

                        $str = "";
                        while ($rows = mysqli_fetch_array($sql_dactrung)) {
                            $str = $str . 
                            '<option value="'.$rows["Madactrung"].'">'.$rows["Madactrung"].'-'.$rows["Tendactrung"].'</option>';
                        }
                        echo $str;
                    ?>
                    </select> 
                </td> 
            <tr>                   
            <tr>
                <td>Tên</td><td><input type="text" name="ten"  value="<?php echo $row['Ten'] ?>"/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="update" value="Update" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

  <?php

    if(isset($_POST['update'])){
        $masp=$_POST['masp'];
        $madactrung=$_POST['madactrung'];
        $ten=$_POST['ten'];
        $iddtsp = $_GET['iddtsp'];

    $sql=("
        UPDATE sanpham SET
                            Masp='$masp',
                            Madactrung='$madactrung',
                            Ten='$ten'
                            where Madtsp=$iddtsp
    ");
    $update=mysqli_query($conn,$sql);
    if($update)
    {
        echo "<script>window.location.href='?admin=dtsp';</script>";
    }
    else {
        echo "Sua san pham loi";
    }
}
    
?>