<h3 class="ltext-101 cl5">
    <a asp-controller="admin" asp-action="Index">Dac Trung San pham </a>    
</h3>
<a href='?admin=themdtsp'>Create New</a>
<br>
<a href='?admin=timkiemdtsp'>Search DTSP</a>

<table class="table table-bordered">
    
    <thead>
        <tr class="table-info">
            <th>
                <p>Mã ĐTSP</p>
            </th>
            <th>
                <p>Mã SP</p>
            </th>
            <th>
                <p>Mã ĐT</p>
            </th>
            <th>
                <p>Tên ĐT</p>
            </th>
            <th>
                <p>Tên loại ĐT</p>
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
             
            $sql_sanpham = mysqli_query($conn,"SELECT *
                FROM dtsp JOIN dactrung ON dtsp.Madactrung = dactrung.Madactrung
                JOIN loaidactrung ON dactrung.Maloaidactrung = loaidactrung.Maloaidactrung
                ORDER BY dtsp.Madtsp");

            $str = "";
            while ($row = mysqli_fetch_array($sql_sanpham)) {
                
                $str = $str . '            <tr class="table-success">
                <td>
                    '.$row["Madtsp"].'
                </td>
                <td>
                    '.$row["Masp"].'
                </td>
                <td>
                    '.$row["Madactrung"].'
                </td>
                <td>
                    '.$row["Tendactrung"].'
                </td>
                <td>
                    '.$row["Tenloaidactrung"].'
                </td>
                <td>
                    <a href="?admin=suadtsp&iddtsp='.$row["Madtsp"].'">Edit</a> |
                    <a href="?admin=xoadtsp&iddtsp='.$row["Madtsp"].'">Delete</a>
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
                        $ketqua =  mysqli_query($conn,"SELECT COUNT(*) as Num FROM dtsp");  
                        while($row = mysqli_fetch_assoc($ketqua)) {
                            $total_results = $row['Num'];

                         }  

                        // Tính tổng số trang. Làm tròn lên sử dụng ceil()  
                        $total_pages = ceil($total_results / $max_results);  


                        // Tạo liên kết đến trang trước trang đang xem 
                        if($page > 1){  
                        $prev = ($page - 1);  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=dtsp&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
                        }  

                        for($i = 1; $i <= $total_pages; $i++){  
                        if(($page) == $i){  
                        echo "$i&nbsp";  
                        } else {  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=dtsp&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
                        }  
                        }  

                        // Tạo liên kết đến trang tiếp theo  
                        if($page < $total_pages){  
                        $next = ($page + 1);  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=dtsp&page=$next\"><button class='trang'>Trang sau</button></a>";  
                        }  
                        echo "</center>";       
        
                ?>
            </div>