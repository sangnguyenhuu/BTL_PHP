<h3 class="ltext-101 cl5">
    <a asp-controller="admin" asp-action="Index">Tim Kiem Chi Tiet San Pham </a>    
</h3>
<form method="post">
    <lable>Tim kiem : </lable>

    <select name="columns">
     <?php   
                    $sql_columns = mysqli_query($conn,"SHOW COLUMNS FROM taikhoan");

                        $str = "";
                        while ($rows = mysqli_fetch_array($sql_columns)) {
                            $str = $str . 
                            '<option value="'.$rows["Field"].'">'.$rows["Field"].'</option>';
                        }
                        echo $str;
        ?>
    </select> 
    <input type="text" name="timkiem">
    <input type="submit" name="search">

</form>  

<table class="table table-bordered">
    
    <thead>
        <tr class="table-info">
            <th>
                <p>Mã tài khoản</p>
            </th>
            <th>
                <p>Tên đăng nhập</p>
            </th>            
            <th>
                <p>Mật khẩu</p>
            </th>
            <th>
                <p>Loại TK</p>
            </th>
            <th>
                <p>Họ Tên</p>
            </th>
            <th>
                <p>Địa chỉ</p>
            </th>
            <th>
                <p>Giới tính </p>
            </th>
            <th>
                <p>SDT</p>
            </th>

            <th></th>
        </tr>
    </thead>
    <tbody>

<?php
            if(isset($_POST['search'])){
                $columns=$_POST['columns'];
                $timkiem=$_POST['timkiem'];
            
            $sql_timkiem = mysqli_query($conn,"SELECT * FROM taikhoan WHERE $columns like '%".$timkiem."%'");

            if($sql_timkiem){
            $str = "";
            while ($row_timkiem = mysqli_fetch_array($sql_timkiem)) {
                
                $str = $str . '          <tr class="table-success">
                <td>
                    '.$row_timkiem["Mataikhoan"].'
                </td>
                <td>
                    '.$row_timkiem["Tendangnhap"].'
                </td>                
                <td>
                    '.$row_timkiem["Matkhau"].'
                </td>
                <td>
                    '.$row_timkiem["Loaitaikhoan"].'
                </td>
                <td>
                    '.$row_timkiem["Hoten"].'
                </td>
                <td>
                    '.$row_timkiem["Diachi"].'
                </td>
                <td>
                    '.$row_timkiem["Gioitinh"].'
                </td>
                <td>
                    '.$row_timkiem["SDT"].'
                </td>

                <td>
                    <a href="?admin=suataikhoan&idtaikhoan='.$row_timkiem["Mataikhoan"].'">Edit</a> |
                    <a href="?admin=xoataikhoan&idtaikhoan='.$row_timkiem["Mataikhoan"].'">Delete</a>
                </td>
            </tr>';
            }
            echo $str;
        }
    }else{
        
    }
    
                

?>
        
    </tbody>
</table>



