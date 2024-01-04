<link rel="stylesheet" type="text/css" href="css/table.css">

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Thêm Loại Sản Phẩm </td>
            </tr>

            <tr>
                <td>Tên loại sản phẩm </td><td><input type="text" name="tenloaisp"  value=""/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="insert" value="Insert" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

<?php

    if(isset($_POST['insert'])){
        $tenloaisp=$_POST['tenloaisp'];         

    $sql=("
        INSERT INTO loaisp (Maloaisp,Tenloaisp)
        VALUES ('','$tenloaisp')
        ");
    $insert=mysqli_query($conn,$sql);
    if($insert)
    {
        echo "<script>window.location.href='?admin=loaisp';</script>";
    }
    else {
        echo "Them loi";
    }
}
    
?>