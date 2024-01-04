<link rel="stylesheet" type="text/css" href="css/table.css">

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Thêm Chi Tiết Nhập Kho </td>
            </tr>           
           <tr>
                <td>Số lượng</td><td><input type="text" name="soluong" value=""/></td>
            </tr>            
            <tr>
                <td>Mã nhập kho </td><td><input type="text" name="manhapkho" value=""/></td>
            </tr>
            <tr>
                <td>Mã sản phẩm </td><td><input type="text" name="masanpham" value=""/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="insert" value="Insert" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

<?php

    if(isset($_POST['insert'])){
        $soluong=$_POST['soluong'];
        $manhapkho=$_POST['manhapkho'];
        $masanpham = $_POST['masanpham'];
            

    $sql=("
        INSERT INTO chitietnhapkho (Machitietnhap,Soluong,Manhapkho,Masanpham)
        VALUES ('','$soluong', '$manhapkho' , '$masanpham')
        ");
    $insert=mysqli_query($conn,$sql);
    if($insert)
    {
        echo "<script>window.location.href='?admin=chitietnhapkho';</script>";
    }
    else {
        echo "Them loi";
    }
}
    
?>