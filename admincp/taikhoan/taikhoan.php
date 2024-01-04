<h3 class="ltext-101 cl5">
    <a asp-controller="admin" asp-action="Index">Tai Khoan </a>    
</h3>

<a href='?admin=timkiemtaikhoan'>Search TK</a>


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
            if(!isset($_GET['page'])){  
            $page = 1;  
            } else {  
            $page = $_GET['page'];  
            } 
            // Chọn số kết quả trả về trong mỗi trang mặc định là 10 
            $max_results = 10;  

            // Tính số thứ tự giá trị trả về của đầu trang hiện tại 
            $from = (($page * $max_results) - $max_results);  
            
            $sql_chitietsanpham = mysqli_query($conn,"SELECT * FROM taikhoan LIMIT $from, $max_results");

            $str = "";
            while ($row = mysqli_fetch_array($sql_chitietsanpham)) {
                
                $str = $str . '          <tr class="table-success">
                <td>
                    '.$row["Mataikhoan"].'
                </td>
                <td>
                    '.$row["Tendangnhap"].'
                </td>                
                <td>
                    '.$row["Matkhau"].'
                </td>
                <td>
                    '.$row["Loaitaikhoan"].'
                </td>
                <td>
                    '.$row["Hoten"].'
                </td>
                <td>
                    '.$row["Diachi"].'
                </td>
                <td>
                    '.$row["Gioitinh"].'
                </td>
                <td>
                    '.$row["SDT"].'
                </td>

                <td>
                    <a href="?admin=suataikhoan&idtaikhoan='.$row["Mataikhoan"].'">Edit</a> |
                    <a href="?admin=xoataikhoan&idtaikhoan='.$row["Mataikhoan"].'">Delete</a>
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
                        $ketqua =  mysqli_query($conn,"SELECT COUNT(*) as Num FROM taikhoan");  
                        while($row = mysqli_fetch_assoc($ketqua)) {
                            $total_results = $row['Num'];

                         }  

                        // Tính tổng số trang. Làm tròn lên sử dụng ceil()  
                        $total_pages = ceil($total_results / $max_results);  


                        // Tạo liên kết đến trang trước trang đang xem 
                        if($page > 1){  
                        $prev = ($page - 1);  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=taikhoan&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
                        }  

                        for($i = 1; $i <= $total_pages; $i++){  
                        if(($page) == $i){  
                        echo "$i&nbsp";  
                        } else {  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=taikhoan&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
                        }  
                        }  

                        // Tạo liên kết đến trang tiếp theo  
                        if($page < $total_pages){  
                        $next = ($page + 1);  
                        echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=taikhoan&page=$next\"><button class='trang'>Trang sau</button></a>";  
                        }  
                        echo "</center>";       
        
                ?>
            </div>
