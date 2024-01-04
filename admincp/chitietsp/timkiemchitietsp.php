<h3 class="ltext-101 cl5">
    <a asp-controller="admin" asp-action="Index">Tim Kiem Chi Tiet San Pham </a>    
</h3>
<form method="post">
    <lable>Tim kiem : </lable>

    <select name="columns">
     <?php   
                    $sql_columns = mysqli_query($conn,"SHOW COLUMNS FROM chitietsp");

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
                <p>Mã chi tiết sản phẩm</p>
            </th>
            <th>
                <p>Mã sản phẩm</p>
            </th>            
            <th>
                <p>IMEI</p>
            </th>
            <th>
                <p>Tình trạng bán</p>
            </th>
            <th>
                <p>Mã chi tiết nhập kho</p>
            </th>
            <th>
                <p>Mã chi tiết đơn đặt</p>
            </th>

            <th></th>
        </tr>
    </thead>
    <tbody>

<?php
            if(isset($_POST['search'])){
                $columns=$_POST['columns'];
                $timkiem=$_POST['timkiem'];
            
            $sql_timkiem = mysqli_query($conn,"SELECT * FROM chitietsp WHERE $columns like '%".$timkiem."%'");

            if($sql_timkiem){
            $str = "";
            while ($row_timkiem = mysqli_fetch_array($sql_timkiem)) {
                
                $str = $str . '          <tr class="table-success">
                <td>
                    '.$row_timkiem["Machitietsp"].'
                </td>
                <td>
                    '.$row_timkiem["Masp"].'
                </td>                
                <td>
                    '.$row_timkiem["IMEI"].'
                </td>
                <td>
                    '.$row_timkiem["Tinhtrangban"].'
                </td>
                <td>
                    '.$row_timkiem["Machitietnhapkho"].'
                </td>
                <td>
                    '.$row_timkiem["Machitietdondat"].'
                </td>

                <td>
                    <a href="?admin=suachitietsp&idchitietsp='.$row_timkiem["Machitietsp"].'">Edit</a> |
                    <a href="?admin=xoachitietsp&idchitietsp='.$row_timkiem["Machitietsp"].'">Delete</a>
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



