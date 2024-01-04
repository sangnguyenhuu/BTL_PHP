<link rel="stylesheet" type="text/css" href="css/table.css">

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Thêm Chi Tiết Sản Phẩm </td>
            </tr>
            <tr>
                <td>Mã sản phẩm</td><td><input type="text" name="masp" value=""/></td>
            </tr>            
            <tr>
                <td>IMEI</td><td><input type="text" name="IMEI"  value=""/></td>
            </tr>
            <tr>
                <td>Tình trạng bán</td><td><input type="text" name="tinhtrangban"  value=""/></td>
            </tr>
            <tr>
                <td>Mã chi tiết nhập kho</td><td><input type="text" name="machitietnhapkho"  value=""/></td>
            </tr>
            <tr>
                <td>Mã chi tiết đơn đặt</td><td><input type="text" name="machitietdondat"  value=""/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="insert" value="Insert" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

<?php

    if(isset($_POST['insert'])){
        $masp=$_POST['masp'];
        $IMEI=$_POST['IMEI'];
        $tinhtrangban=$_POST['tinhtrangban'];
        $machitietnhapkho=$_POST['machitietnhapkho'];
        $machitietdondat=$_POST['machitietdondat'];

          

    $sql=("
        INSERT INTO chitietsp (Machitietsp, Masp, IMEI, Tinhtrangban, Machitietnhapkho, Machitietdondat )
        VALUES ('','$masp', '$IMEI','$tinhtrangban' , '$machitietnhapkho' , '$machitietdondat')
        ");
    $insert=mysqli_query($conn,$sql);
    if($insert)
    {
        echo "<script>window.location.href='?admin=chitietsp';</script>";
    }
    else {
        echo "Them loi";
    }
}
    
?>