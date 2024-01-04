<link rel="stylesheet" type="text/css" href="css/table.css">

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Thêm Đặc Trưng Sản Phẩm </td>
            </tr>           
            <tr>
                <td>Mã SP</td>
                <td>
                    <select name="masp">
                    <?php
                    $sql= mysqli_query($conn,"SELECT * FROM sanpham");

                        $str = "";
                        while ($row = mysqli_fetch_array($sql)) {
                            $str = $str . 
                            '<option value="'.$row["Masp"].'">'.$row["Masp"].'-'.$row["Tensp"].'</option>';
                        }
                        echo $str;
                    ?>
                    </select> 
                </td>
            </tr>

            <tr>
                <td>Mã Đặc Trưng</td>
                <td>
                    <select name="madactrung">
                    <?php
                    $sql= mysqli_query($conn,"SELECT * FROM dactrung");

                        $str = "";
                        while ($row = mysqli_fetch_array($sql)) {
                            $str = $str . 
                            '<option value="'.$row["Madactrung"].'">'.$row["Madactrung"].'-'.$row["Tendactrung"].'</option>';
                        }
                        echo $str;
                    ?>
                    </select> 
                </td>
            </tr>

            <tr>
                <td>Tên</td><td><input type="text" name="ten"  value=""/></td>
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
        $madactrung=$_POST['madactrung'];
        $ten=$_POST['ten'];
            

    $sql=("
        INSERT INTO dtsp (Madtsp,Masp,Madactrung, Ten)
        VALUES ('','$masp', '$madactrung','$ten')
        ");
    $insert=mysqli_query($conn,$sql);
    if($insert)
    {
        echo "<script>window.location.href='?admin=dtsp';</script>";
    }
    else {
        echo "Them loi";
    }
}
    
?>