<h3 class="ltext-101 cl5">
    <a asp-controller="admin" asp-action="Index">Tim Kiem Chi Tiet Don Dat </a>    
</h3>
<form method="post">
    <lable>Tim kiem : </lable>

    <select name="columns">
     <?php   
                    $sql_columns = mysqli_query($conn,"SHOW COLUMNS FROM chitietdondat");

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
                <p>Mã chi tiết đơn đạt</p>
            </th>
            <th>
                <p>Số lượng</p>
            </th>    
             <th>
                <p>Giá đơn</p>
            </th>                     
            <th>
                <p>Mã đơn đặt</p>
            </th>            
            <th>
                <p>Mã sản phẩm</p>
            </th>
        </tr>
    </thead>
    <tbody>

<?php
            if(isset($_POST['search'])){
                $columns=$_POST['columns'];
                $timkiem=$_POST['timkiem'];
            
            $sql_timkiem = mysqli_query($conn,"SELECT * FROM chitietdondat WHERE $columns like '%".$timkiem."%'");

            if($sql_timkiem){
            $str = "";
            while ($row_timkiem = mysqli_fetch_array($sql_timkiem)) {
                
                $str = $str . '          <tr class="table-success">
                <td>
                    '.$row_timkiem["Machitietdondat"].'
                </td>
                <td>
                    '.$row_timkiem["Soluong"].'
                </td>      
                <td>
                    '.$row_timkiem["Giadon"].'
                </td>                             
                <td>
                    '.$row_timkiem["Madondat"].'
                </td>                
                <td>
                    '.$row_timkiem["Masanpham"].'
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



