<h3 class="ltext-101 cl5">
    <a asp-controller="admin" asp-action="Index"> Nhap Kho </a>    
</h3>
<a href='?admin=themnhapkho'>Create New</a>
<br>
<a href='?admin=timkiemnhapkho'>Search Nhap Kho</a>


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
    
            if(!isset($_GET['page'])){  
            $page = 1;  
            } else {  
            $page = $_GET['page'];  
            } 
            // Chọn số kết quả trả về trong mỗi trang mặc định là 10 
            $max_results = 10;  

            // Tính số thứ tự giá trị trả về của đầu trang hiện tại 
            $from = (($page * $max_results) - $max_results);  
            
            $sql_nhapkho = mysqli_query($conn,"SELECT * FROM nhapkho LIMIT $from, $max_results");

            $str = "";
            while ($row = mysqli_fetch_array($sql_nhapkho)) {
                
                $str = $str . '          <tr class="table-success">
                <td>
                    '.$row["Manhapkho"].'
                </td>
                <td>
                    '.$row["Thoigian"].'
                </td>    
                <td>
                    '.$row["Trangthaitt"].'
                </td>
                <td>
                    '.$row["Manhanvien"].'
                </td>
                <td>
                    '.$row["MaNCC"].'
                </td>                            

                <td>
                    <a href="?admin=suanhapkho&idnhapkho='.$row["Manhapkho"].'">Edit</a> |
                    <a href="?admin=xoanhapkho&idnhapkho='.$row["Manhapkho"].'">Delete</a>
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
                        $ketqua =  mysqli_query($conn,"SELECT COUNT(*) as Num FROM nhapkho");  
                        while($row = mysqli_fetch_assoc($ketqua)) {
                            $total_results = $row['Num'];

                         }  

                        // Tính tổng số trang. Làm tròn lên sử dụng ceil()  
                        $total_pages = ceil($total_results / $max_results);  


                        // Tạo liên kết đến trang trước trang đang xem 
                        if($page > 1){  
                        $prev = ($page - 1);  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=nhapkho&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
                        }  

                        for($i = 1; $i <= $total_pages; $i++){  
                        if(($page) == $i){  
                        echo "$i&nbsp";  
                        } else {  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=nhapkho&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
                        }  
                        }  

                        // Tạo liên kết đến trang tiếp theo  
                        if($page < $total_pages){  
                        $next = ($page + 1);  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=nhapkho&page=$next\"><button class='trang'>Trang sau</button></a>";  
                        }  
                        echo "</center>";       
        
                ?>
            </div>

