<link rel="stylesheet" type="text/css" href="css/table.css">

    
<?php
        $idchitietsp=$_GET['idchitietsp'];
        $sql="select * from chitietsp where Machitietsp='".$_GET['idchitietsp']."'";
         $rows=mysqli_query($conn,$sql);
         $row=mysqli_fetch_array($rows);
?>

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Sửa Chi Tiết Sản Phẩm </td>
            </tr>          
            <tr>
                <td>Mã sản phẩm</td><td><input type="text" name="masp" value="<?php echo $row['Masp'] ?>"/></td>
            </tr>            
            <tr>
                <td>IMEI</td><td><input type="text" name="IMEI"  value="<?php echo $row['IMEI'] ?>"/></td>
            </tr>
            <tr>
                <td>Tình trạng bán</td><td><input type="text" name="tinhtrangban"  value="<?php echo $row['Tinhtrangban'] ?>"/></td>
            </tr>
            <tr>
                <td>Mã chi tiết nhập kho</td><td><input type="text" name="machitietnhapkho"  value="<?php echo $row['Machitietnhapkho'] ?>"/></td>
            </tr>
            <tr>
                <td>Mã chi tiết đơn đặt</td><td><input type="text" name="machitietdondat"  value="<?php echo $row['Machitietdondat'] ?>"/></td>
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
        $IMEI=$_POST['IMEI'];
        $tinhtrangban=$_POST['tinhtrangban'];
        $machitietnhapkho=$_POST['machitietnhapkho'];
        $machitietdondat=$_POST['machitietdondat'];
        $idchitietsp = $_GET['idchitietsp'];

    $sql=("
        UPDATE chitietsp SET
                            Masp='$masp',
                            IMEI='$IMEI',
                            Tinhtrangban='$tinhtrangban',
                            Machitietnhapkho='$machitietnhapkho',
                            Machitietdondat='$machitietdondat'
                            where Machitietsp=$idchitietsp
    ");
    $update=mysqli_query($conn,$sql);
    if($update)
        
    {
        echo "<script>window.location.href='?admin=chitietsp';</script>";
    }
    else {
        echo "Sua loi";
    }
}
    
?>