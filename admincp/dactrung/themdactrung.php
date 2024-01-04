<link rel="stylesheet" type="text/css" href="css/table.css">

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Thêm Đặc Trưng </td>
            </tr>           
            <tr>
                <td>Mã loại ĐT</td>
                <td>
                    <select name="maloaidactrung">
                    <?php
                    $sql= mysqli_query($conn,"SELECT * FROM loaidactrung");

                        $str = "";
                        while ($row = mysqli_fetch_array($sql)) {
                            $str = $str . 
                            '<option value="'.$row["Maloaidactrung"].'">'.$row["Maloaidactrung"].'-'.$row["Tenloaidactrung"].'</option>';
                        }
                        echo $str;
                    ?>
                    </select> 
                </td>
            </tr>
            <tr>
                <td>Tên đặc trưng</td><td><input type="text" name="tendactrung"  value=""/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="insert" value="Insert" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

<?php

    if(isset($_POST['insert'])){
        $maloaidactrung=$_POST['maloaidactrung'];
        $tendactrung=$_POST['tendactrung'];
            

    $sql=("
        INSERT INTO dactrung (Madactrung,Maloaidactrung,Tendactrung)
        VALUES ('','$maloaidactrung', '$tendactrung')
        ");
    $insert=mysqli_query($conn,$sql);
    if($insert)
    {
        echo "<script>window.location.href='?admin=dactrung';</script>";
    }
    else {
        echo "Them loi";
    }
}
    
?>