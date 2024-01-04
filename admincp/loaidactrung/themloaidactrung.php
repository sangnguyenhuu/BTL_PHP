<link rel="stylesheet" type="text/css" href="css/table.css">

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Thêm Loại Đặc Trưng </td>
            </tr>

            <tr>
                <td>Tên loại đặc trưng </td><td><input type="text" name="tenloaidactrung"  value=""/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="insert" value="Insert" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

<?php

    if(isset($_POST['insert'])){
        $tenloaidactrung=$_POST['tenloaidactrung'];         

    $sql=("
        INSERT INTO loaidactrung (Maloaidactrung,Tenloaidactrung)
        VALUES ('','$tenloaidactrung')
        ");
    $insert=mysqli_query($conn,$sql);
    if($insert)
    {
        echo "<script>window.location.href='?admin=loaidactrung';</script>";
    }
    else {
        echo "Them loi";
    }
}
    
?>