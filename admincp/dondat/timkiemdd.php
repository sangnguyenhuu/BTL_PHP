<h3 class="ltext-101 cl5">
    <a asp-controller="admin" asp-action="Index">Tim Kiem Don Dat </a>    
</h3>
<form method="post">
    <lable>Tim kiem : </lable>

    <select name="columns">
     <?php   
                    $sql_columns = mysqli_query($conn,"SHOW COLUMNS FROM dondat");

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
                <p>Mã đơn đạt</p>
            </th>
            <th>
                <p>Họ Tên</p>
            </th>   
            <th>
                <p>Địa chỉ</p>
            </th>
            <th>
                <p>SDT</p>
            </th>             
            <th>
                <p>Tổng tiền</p>
            </th>          
            <th>
                <p>Thời gian</p>
            </th>            
            <th>
                <p>Loại đơn đặt</p>
            </th>
            <th>
                <p>Trang thái TT</p>
            </th>
            <th>
                <p>Mã nhân viên</p>
            </th>
            <th>
                <p>Mã khách hàng</p>
            </th>

            <th></th>
        </tr>
    </thead>
    <tbody>

<?php
            if(isset($_POST['search'])){
                $columns=$_POST['columns'];
                $timkiem=$_POST['timkiem'];
            
            $sql_timkiem = mysqli_query($conn,"SELECT * FROM dondat WHERE $columns like '%".$timkiem."%'");

            if($sql_timkiem){
            $str = "";
            while ($row_timkiem = mysqli_fetch_array($sql_timkiem)) {
                
                $str = $str . '          <tr class="table-success">
                <td>
                    '.$row_timkiem["Madondat"].'
                </td>
                <td>
                    '.$row_timkiem["name"].'
                </td>    
                <td>
                    '.$row_timkiem["address"].'
                </td>
                <td>
                    '.$row_timkiem["phone"].'
                </td>
                <td>
                    '.$row_timkiem["total"].'
                </td>                            
                <td>
                    '.$row_timkiem["Thoigian"].'
                </td>                
                <td>
                    '.$row_timkiem["Loaidondat"].'
                </td>
                <td>
                    '.$row_timkiem["Trangthaitt"].'
                </td>
                <td>
                    '.$row_timkiem["Manhanvien"].'
                </td>
                <td>
                    '.$row_timkiem["Makhachhang"].'
                </td>

                <td>
                    <a href="?admin=suadd&iddd='.$row_timkiem["Madondat"].'">Edit</a> |
                    <a href="?admin=xoadd&iddd='.$row_timkiem["Madondat"].'">Delete</a>
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



