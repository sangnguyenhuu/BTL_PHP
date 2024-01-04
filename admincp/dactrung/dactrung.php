<h3 class="ltext-101 cl5">
    <a asp-controller="admin" asp-action="Index"> Dac Trung </a>    
</h3>
<a href='?admin=themdactrung'>Create New</a>
<br>
<a href='?admin=timkiemdactrung'>Search DT</a>


<table class="table table-bordered">
    
    <thead>
        <tr class="table-info">
            <th>
                <p>Mã đặc trưng</p>
            </th>
            <th>
                <p>Mã loại đặc trưng</p>
            </th>            
            <th>
                <p>Tên đặc trưng</p>
            </th>

            <th></th>
        </tr>
    </thead>
    <tbody>

<?php
            if(!isset($_GET['page'])){  
            $page = 1;  
            } else {  
            $page = $_GET['page'];  
            } 
            // Chọn số kết quả trả về trong mỗi trang mặc định là 10 
            $max_results = 10;  

            // Tính số thứ tự giá trị trả về của đầu trang hiện tại 
            $from = (($page * $max_results) - $max_results);  
            
            $sql_dactrung = mysqli_query($conn,"SELECT * FROM dactrung LIMIT $from, $max_results");

            $str = "";
            while ($row = mysqli_fetch_array($sql_dactrung)) {
                
                $str = $str . '          <tr class="table-success">
                <td>
                    '.$row["Madactrung"].'
                </td>
                <td>
                    '.$row["Maloaidactrung"].'
                </td>                
                <td>
                    '.$row["Tendactrung"].'
                </td>

                <td>
                    <a href="?admin=suadactrung&iddactrung='.$row["Madactrung"].'">Edit</a> |
                    <a href="?admin=xoadactrung&iddactrung='.$row["Madactrung"].'">Delete</a>
                </td>
            </tr>';


            }
                echo $str;

                

?>

   
    </tbody>
</table>


            <div class="flex-c-m flex-w w-full p-t-45">
                <?php
                        // Tính tổng kết quả trong toàn DB:  
                        $ketqua =  mysqli_query($conn,"SELECT COUNT(*) as Num FROM dactrung");  
                        while($row = mysqli_fetch_assoc($ketqua)) {
                            $total_results = $row['Num'];

                         }  

                        // Tính tổng số trang. Làm tròn lên sử dụng ceil()  
                        $total_pages = ceil($total_results / $max_results);  


                        // Tạo liên kết đến trang trước trang đang xem 
                        if($page > 1){  
                        $prev = ($page - 1);  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=dactrung&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
                        }  

                        for($i = 1; $i <= $total_pages; $i++){  
                        if(($page) == $i){  
                        echo "$i&nbsp";  
                        } else {  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=dactrung&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
                        }  
                        }  

                        // Tạo liên kết đến trang tiếp theo  
                        if($page < $total_pages){  
                        $next = ($page + 1);  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=dactrung&page=$next\"><button class='trang'>Trang sau</button></a>";  
                        }  
                        echo "</center>";       
        
                ?>
            </div>
