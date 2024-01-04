<h3 class="ltext-101 cl5">
    <a asp-controller="admin" asp-action="Index">Tim Kiem Loai San Pham </a>    
</h3>
<form method="post">
    <lable>Tim kiem : </lable>

    <select name="columns">
     <?php   
                    $sql_columns = mysqli_query($conn,"SHOW COLUMNS FROM loaisp");

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
                <p>Mã loại sản phẩm</p>
            </th>
            <th>
                <p>Tên loại sản phẩm</p>
            </th>            


            <th></th>
        </tr>
    </thead>
    <tbody>

<?php
            if(isset($_POST['search'])){
                $columns=$_POST['columns'];
                $timkiem=$_POST['timkiem'];
            
            $sql_timkiem = mysqli_query($conn,"SELECT * FROM loaisp WHERE $columns like '%".$timkiem."%'");

            if($sql_timkiem){
            $str = "";
            while ($row_timkiem = mysqli_fetch_array($sql_timkiem)) {
                
                $str = $str . '          <tr class="table-success">
                <td>
                    '.$row_timkiem["Maloaisp"].'
                </td>
                <td>
                    '.$row_timkiem["Tenloaisp"].'
                </td>                

                <td>
                    <a href="?admin=sualoaisp&idloaisp='.$row_timkiem["Maloaisp"].'">Edit</a> |
                    <a href="?admin=xoaloaisp&idloaisp='.$row_timkiem["Maloaisp"].'">Delete</a>
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



