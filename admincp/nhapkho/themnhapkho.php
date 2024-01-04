<link rel="stylesheet" type="text/css" href="css/table.css">

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Thêm Nhập Kho </td>
            </tr>          
            <tr>
            <tr>
                <td>Trạng thái TT</td>
                <td>
                    <select name="trangthaitt">
                    <?php
                    echo '
                    <option value="1">1-Đang xử lý</option>
                    <option value="2">2-Đã xử lý</option>
                    <option value="3">3-Đã hoàn tất</option>
                    <option value="0">0-Hủy</option>
                    ';
                    ?>
                    </select> 
                </td>
            </tr>            </tr>
            <tr>
                <td>Mã nhân viên</td><td><input type="text" name="manhanvien"  value=""/></td>
            </tr>
            <tr>
                <td>Mã NCC</td><td><input type="text" name="mancc"  value=""/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="insert" value="Insert" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

<?php

    if(isset($_POST['insert'])){
        $trangthaitt=$_POST['trangthaitt'];
        $manhanvien=$_POST['manhanvien'];
        $mancc=$_POST['mancc'];
            

    $sql=("
        INSERT INTO nhapkho (Manhapkho,Thoigian ,Trangthaitt, Manhanvien, MaNCC)
        VALUES ('','', '$trangthaitt','$manhanvien' , '$mancc')
        ");
    $insert=mysqli_query($conn,$sql);
    if($insert)
    {
        echo "<script>window.location.href='?admin=nhapkho';</script>";
    }
    else {
        echo "Them san pham loi";
    }
}
    
?>