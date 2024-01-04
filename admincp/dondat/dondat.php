<h3 class="ltext-101 cl5">
    <a asp-controller="admin" asp-action="Index"> Don Dat </a>    
</h3>
<a href='?admin=timkiemdd'>Search Don Dat</a>


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
    
            if(!isset($_GET['page'])){  
            $page = 1;  
            } else {  
            $page = $_GET['page'];  
            } 
            // Chọn số kết quả trả về trong mỗi trang mặc định là 10 
            $max_results = 10;  

            // Tính số thứ tự giá trị trả về của đầu trang hiện tại 
            $from = (($page * $max_results) - $max_results);  
            
            $sql_dondat = mysqli_query($conn,"SELECT * FROM dondat LIMIT $from, $max_results");

            $str = "";
            while ($row = mysqli_fetch_array($sql_dondat)) {
                
                $str = $str . '          <tr class="table-success">
                <td>
                    '.$row["Madondat"].'
                </td>
                <td>
                    '.$row["name"].'
                </td>    
                <td>
                    '.$row["address"].'
                </td>
                <td>
                    '.$row["phone"].'
                </td>
                <td>
                    '.$row["total"].'
                </td>                            
                <td>
                    '.$row["Thoigian"].'
                </td>                
                <td>
                    '.$row["Loaidondat"].'
                </td>
                <td>
                    '.$row["Trangthaitt"].'
                </td>
                <td>
                    '.$row["Manhanvien"].'
                </td>
                <td>
                    '.$row["Makhachhang"].'
                </td>

                <td>
                    <a href="?admin=suadd&iddd='.$row["Madondat"].'">Edit</a> |
                    <a href="?admin=xoadd&iddd='.$row["Madondat"].'">Delete</a>
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
                        $ketqua =  mysqli_query($conn,"SELECT COUNT(*) as Num FROM dondat");  
                        while($row = mysqli_fetch_assoc($ketqua)) {
                            $total_results = $row['Num'];

                         }  

                        // Tính tổng số trang. Làm tròn lên sử dụng ceil()  
                        $total_pages = ceil($total_results / $max_results);  


                        // Tạo liên kết đến trang trước trang đang xem 
                        if($page > 1){  
                        $prev = ($page - 1);  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=dondat&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
                        }  

                        for($i = 1; $i <= $total_pages; $i++){  
                        if(($page) == $i){  
                        echo "$i&nbsp";  
                        } else {  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=dondat&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
                        }  
                        }  

                        // Tạo liên kết đến trang tiếp theo  
                        if($page < $total_pages){  
                        $next = ($page + 1);  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=dondat&page=$next\"><button class='trang'>Trang sau</button></a>";  
                        }  
                        echo "</center>";       
        
                ?>
            </div>

