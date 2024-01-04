<h3 class="ltext-101 cl5">
    <a asp-controller="admin" asp-action="Index">Tim Kiem Nhap Kho </a>    
</h3>
<form method="post">
    <lable>Tim kiem : </lable>

    <select name="columns">
     <?php   
                    $sql_columns = mysqli_query($conn,"SHOW COLUMNS FROM nhapkho");

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
                <p>Mã nhập kho</p>
            </th>
            <th>
                <p>Thời gian </p>
            </th>   
            <th>
                <p>Trạng thái TT</p>
            </th>
            <th>
                <p>Mã nhân viên</p>
            </th>             
            <th>
                <p>Mã NCC</p>
            </th> 

            <th></th>
        </tr>
    </thead>
    <tbody>

<?php
            if(isset($_POST['search'])){
                $columns=$_POST['columns'];
                $timkiem=$_POST['timkiem'];
            
            $sql_timkiem = mysqli_query($conn,"SELECT * FROM nhapkho WHERE $columns like '%".$timkiem."%'");

            if($sql_timkiem){
            $str = "";
            while ($row_timkiem = mysqli_fetch_array($sql_timkiem)) {
                
                $str = $str . '          <tr class="table-success">
                <td>
                    '.$row_timkiem["Manhapkho"].'
                </td>
                <td>
                    '.$row_timkiem["Thoigian"].'
                </td>    
                <td>
                    '.$row_timkiem["Trangthaitt"].'
                </td>
                <td>
                    '.$row_timkiem["Manhanvien"].'
                </td>
                <td>
                    '.$row_timkiem["MaNCC"].'
                </td>                            

                <td>
                    <a href="?admin=suanhapkho&idnhapkho='.$row_timkiem["Manhapkho"].'">Edit</a> |
                    <a href="?admin=xoanhapkho&idnhapkho='.$row_timkiem["Manhapkho"].'">Delete</a>
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



