<link rel="stylesheet" type="text/css" href="css/table.css">

<form action="" method="post" name="frm"  enctype="multipart/form-data">
    <table>
            <tr class="tieude_themsp">
                <td colspan=2>Thêm Sản Phẩm </td>
            </tr>
            <tr>
                <td>Tên SP</td><td><input type="text" name="tensp" value=""/></td>
            </tr>            
            <tr>
                <td>Mã loại SP</td>
                <td>
                    <select name="maloaisp">
                    <?php
                    $sql= mysqli_query($conn,"SELECT * FROM loaisp");

                        $str = "";
                        while ($row = mysqli_fetch_array($sql)) {
                            $str = $str . 
                            '<option value="'.$row["Maloaisp"].'">'.$row["Maloaisp"].'-'.$row["Tenloaisp"].'</option>';
                        }
                        echo $str;
                    ?>
                    </select> 
                </td>
            </tr>
            <tr>
                <td>Số lượng</td><td><input type="text" name="soluong"  value=""/></td>
            </tr>
            <tr>
                <td>Đơn giá nhập</td><td><input type="text" name="gianhap"  value=""/></td>
            </tr>
            <tr>
                <td>Đơn giá bán</td><td><input type="text" name="giaban"  value=""/></td>
            </tr>
            <tr>
                <td>Hình ảnh</td><td><input type="file" name="hinhanh"  value=""/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="insert" value="Insert" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

<?php

    if(isset($_POST['insert'])){
        $maloaisp=$_POST['maloaisp'];
        $tensp=$_POST['tensp'];
        $soluong=$_POST['soluong'];
        $gianhap=$_POST['gianhap'];
        $giaban=$_POST['giaban'];
        $file = $_FILES["hinhanh"];
        $filename = $file["name"]; // Tên tệp
        $temp_path = $file["tmp_name"];
            

    $sql=("
        INSERT INTO sanpham (Masp,Maloaisp,Tensp, Soluong, Dongianhap, Dongiaban , Hinhanh)
        VALUES ('','$maloaisp', '$tensp','$soluong' , '$gianhap' , '$giaban', '$filename')
        ");
    $insert=mysqli_query($conn,$sql);
    if($insert)
    {
        move_uploaded_file($temp_path, "HinhanhSP/" . $filename);
        echo "<script>window.location.href='?admin=sanpham';</script>";
    }
    else {
        echo "Them san pham loi";
    }
}
    
?>