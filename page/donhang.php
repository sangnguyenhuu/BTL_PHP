<?php
	if(!isset($_SESSION['user_ma'])){
		header('location:login_form.php');
	}

	$id = $_SESSION['user_ma'];
	
	$don_hang = "SELECT * FROM `dondat` WHERE `Makhachhang` = ".$id."";
	$dh = mysqli_query($mysqli,$don_hang);

	// **************phân trang*********************
	//truy vấn danh mục
	$query_dondat= mysqli_query($mysqli, $don_hang);
	///////

  // BƯỚC 2: TÌM TỔNG SỐ RECORDS
	$s = "SELECT count(Madondat) as total from `dondat` WHERE `Makhachhang` = ".$id."";
        $result = mysqli_query($mysqli, $s);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page&&$total_page>0){
            $current_page = $total_page;

        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức

        $result = mysqli_query($mysqli, "SELECT * FROM `dondat` WHERE `Makhachhang` = $id  LIMIT $start, $limit");
?>
<h2>Lich su don hang</h2>
<div class="wrap-table-shopping-cart">
			<table class="table-shopping-cart">
				<tbody id="display">
					<tr class="table_head">
						<th class="column-1" > STT </th>
						<th class="column-1" > Ma Don Hang </th>
						<th class="column-3" > Ngay dat </th>
						<th class="column-3" > Ten nguoi nhan </th>
						<th class="column-3" > Dia chi </th>
						<th class="column-3" > SDT </th>
						<th class="column-3" > Tong tien </th>
						<th class="column-3" > Tinh trang </th>
						<th class="column-3" > Chi tiet</th>
					</tr>
					<?php
						$stt=$start+1;
						while($row = mysqli_fetch_array($result)) {
							$dateTime = date_create($row["Thoigian"]);
							$dateTime = date_format($dateTime,"d/m/Y");
							
					?>
					<tr class="table_row">
						<th class="column-1" > <?=$stt++ ?> </th>
						<th class="column-1" > <?php echo $row['Madondat'] ?> </th>
						<th class="column-3" > <?php echo $dateTime ?> </th>
						<th class="column-3" > <?php echo $row['name'] ?> </th>
						<th class="column-3" > <?php echo $row['address'] ?> </th>
						<th class="column-3" > <?php echo $row['phone'] ?> </th>
						<th class="column-3" > <?php echo number_format($row['total']); ?> VND</th>
						
						<th class="column-3" > <?php if($row['Trangthaitt'] == 0){echo "Huy";}elseif ($row['Trangthaitt'] == 1) {echo "Dang xu ly";}elseif ($row['Trangthaitt'] == 2) {echo "Da xu ly";}else{echo "Da hoan tat";} ?> </th>

						<th class="column-3" > <a href="index.php?quanly=chitietdonhang&id=<?php echo $row['Madondat'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									Chi tiet
								</a></th>
					</tr>
					<?php } if($total_page < 1) {?>
					<tfoot>
						<tr class="table_row">
							<th class="column-3" colspan="9" style="text-align: center;">Chua co  don hang nao</th>
						</tr>
					</tfoot>
					<?php }?>
				</tbody>
			</table>
</div>

        <div class="text-center my-3">
		<?php
		  //trang trước

		  //echo"khôi";
		  if($current_page > 1){  
		      $prev = ($current_page - 1);  
		      echo "<a href='index.php?quanly=donhang&page=$prev'><button class='btn btn-primary'><i class='bi bi-arrow-left'></i></button></a>&nbsp;";  
		      }  
		  for ($i = 1; $i <= $total_page; $i++) {
		  	if($i==$current_page){
		  		echo "<a class='btn btn-primary text-dark' href='index.php?quanly=donhang&page=$i'>$i</a> ";
		  	}else{
		  		echo "<a class='btn btn-primary' href='index.php?quanly=donhang&page=$i'>$i</a> ";
		  	}
		    
		  }
		  //trang tiếp theo
		  if($current_page < $total_page){  
		      $next = ($current_page + 1);  
		      echo "<a href='index.php?quanly=donhang&page=$next'><button class='btn btn-primary'><i class='bi bi-arrow-right'></i></button></a>";  
		      }  
		      //echo "</center>";
		?>
</div>

