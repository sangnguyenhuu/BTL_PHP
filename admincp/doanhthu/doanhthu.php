<?php

// Truy vấn cơ sở dữ liệu để lấy thông tin doanh thu trong 7 ngày qua
$sql = "SELECT DATE(Thoigian) as Ngay, SUM(total) as TongDoanhThu FROM dondat WHERE Thoigian >= DATE_SUB(CURRENT_DATE(), INTERVAL 7 DAY) GROUP BY DATE(Thoigian)";

$result = mysqli_query($conn, $sql);

$ngay = array();
$tongDoanhThu = array();

while($row = mysqli_fetch_assoc($result)) {
    $ngay[] = $row['Ngay'];
    $tongDoanhThu[] = $row['TongDoanhThu'];
    
}
$tongTatCaDoanhThu = array_sum($tongDoanhThu);
$tongTatCaDoanhThuFormatted = number_format($tongTatCaDoanhThu);

// Truy vấn cơ sở dữ liệu để lấy thông tin doanh thu trong 30 ngày qua
$sql_30ngay = "SELECT DATE(Thoigian) as Ngay, SUM(total) as TongDoanhThu FROM dondat WHERE Thoigian >= DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY) GROUP BY DATE(Thoigian)";

$result_30ngay = mysqli_query($conn, $sql_30ngay);

$ngay_30ngay = array();
$tongDoanhThu_30ngay = array();


while($row = mysqli_fetch_assoc($result_30ngay)) {
    $ngay_30ngay[] = $row['Ngay'];
    $tongDoanhThu_30ngay[] = $row['TongDoanhThu'];
}
$tongTatCaDoanhThu_30ngay = array_sum($tongDoanhThu_30ngay);
$tongTatCaDoanhThuFormatted_30ngay = number_format($tongTatCaDoanhThu_30ngay);

// Truy vấn cơ sở dữ liệu để lấy thông tin doanh thu trong 365 ngày qua
$sql_365ngay = "SELECT DATE(Thoigian) as Ngay, SUM(total) as TongDoanhThu FROM dondat WHERE Thoigian >= DATE_SUB(CURRENT_DATE(), INTERVAL 365 DAY) GROUP BY DATE(Thoigian)";

$result_365ngay = mysqli_query($conn, $sql_365ngay);

$ngay_365ngay = array();
$tongDoanhThu_365ngay = array();


while($row = mysqli_fetch_assoc($result_365ngay)) {
    $ngay_365ngay[] = $row['Ngay'];
    $tongDoanhThu_365ngay[] = $row['TongDoanhThu'];
}
$tongTatCaDoanhThu_365ngay = array_sum($tongDoanhThu_365ngay);
$tongTatCaDoanhThuFormatted_365ngay = number_format($tongTatCaDoanhThu_365ngay);


$tongTienLoi_7ngay = 0;
$tongTienLoi_30ngay = 0;
$tongTienLoi_365ngay = 0;

// Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết đơn đặt hàng trong 7 ngày qua
$sql_chitiet_7ngay = "SELECT d.Madondat, c.Machitietdondat, c.Soluong, c.giadon, p.Dongianhap 
                    FROM chitietdondat c 
                    JOIN dondat d ON c.Madondat = d.Madondat 
                    JOIN sanpham p ON c.Masanpham = p.Masp 
                    WHERE d.Thoigian >= DATE_SUB(CURRENT_DATE(), INTERVAL 7 DAY)";
$result_chitiet_7ngay = mysqli_query($conn, $sql_chitiet_7ngay);

while ($row = mysqli_fetch_assoc($result_chitiet_7ngay)) {
    $tongTienLoi_7ngay += ($row['giadon'] - $row['Dongianhap']) * $row['Soluong'];
}

// Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết đơn đặt hàng trong 30 ngày qua
$sql_chitiet_30ngay = "SELECT d.Madondat, c.Machitietdondat, c.Soluong, c.giadon, p.Dongianhap 
                    FROM chitietdondat c 
                    JOIN dondat d ON c.Madondat = d.Madondat 
                    JOIN sanpham p ON c.Masanpham = p.Masp 
                    WHERE d.Thoigian >= DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY)";
$result_chitiet_30ngay = mysqli_query($conn, $sql_chitiet_30ngay);

while ($row = mysqli_fetch_assoc($result_chitiet_30ngay)) {
    $tongTienLoi_30ngay += ($row['giadon'] - $row['Dongianhap']) * $row['Soluong'];
}

// Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết đơn đặt hàng trong 365 ngày qua
$sql_chitiet_365ngay = "SELECT d.Madondat, c.Machitietdondat, c.Soluong, c.giadon, p.Dongianhap 
                    FROM chitietdondat c 
                    JOIN dondat d ON c.Madondat = d.Madondat 
                    JOIN sanpham p ON c.Masanpham = p.Masp 
                    WHERE d.Thoigian >= DATE_SUB(CURRENT_DATE(), INTERVAL 365 DAY)";
$result_chitiet_365ngay = mysqli_query($conn, $sql_chitiet_365ngay);

while ($row = mysqli_fetch_assoc($result_chitiet_365ngay)) {
    $tongTienLoi_365ngay += ($row['giadon'] - $row['Dongianhap']) * $row['Soluong'];
}


$tongTienLoiFormatted_7ngay = number_format($tongTienLoi_7ngay);
$tongTienLoiFormatted_30ngay = number_format($tongTienLoi_30ngay);
$tongTienLoiFormatted_365ngay = number_format($tongTienLoi_365ngay);


?>
<style>
/* Định dạng cho button */
.custom-button {
    background-color: #4CAF50; /* Màu nền */
    color: white; /* Màu chữ */
    border: none; /* Không có viền */
    padding: 10px 20px; /* Kích thước nút */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 4px; /* Góc bo tròn */
    cursor: pointer;
    transition: background-color 0.3s; /* Hiệu ứng hover */
    margin-left:1000px;
}

/* Định dạng khi đưa chuột qua nút */
.custom-button:hover {
    background-color: #45a049; /* Màu nền khi hover */
}
</style>
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Thống kê doanh thu
            </h3>
        </div>
        <!-- <button id="tktl" class="custom-button">Thống kê tiền lời -->
        </button>
        <div class="chart-container" style="position: relative; height:40vh; width:80vw;">
            <canvas id="myChart"></canvas>
            <div class="chart-info">
                <br>
                <h4 id="tongDoanhThu">Tổng doanh thu trong 7 ngày gần nhất: <?php echo ($tongTatCaDoanhThuFormatted); ?> VNĐ</h4>
                <br>
                <h4 id="tongTienLoi_7ngay">Tổng tiền lời trong 7 ngày gần nhất: <?php echo ($tongTienLoiFormatted_7ngay); ?> VNĐ</h4>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="chart-container" style="position: relative; height:40vh; width:80vw;">
            <canvas id="myChart30ngay"></canvas>
            <div class="chart-info">
                <br>
                <h4 id="tongDoanhThu">Tổng doanh thu trong 30 ngày gần nhất: <?php echo ($tongTatCaDoanhThuFormatted_30ngay); ?> VNĐ</h4>
                <br>
                <h4 id="tongTienLoi_30ngay">Tổng tiền lời trong 30 ngày gần nhất: <?php echo ($tongTienLoiFormatted_30ngay); ?> VNĐ</h4>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>    
        <div class="chart-container" style="position: relative; height:40vh; width:80vw;">
            <canvas id="myChart365ngay"></canvas>
            <div class="chart-info">
                <br>
                <h4 id="tongDoanhThu">Tổng doanh thu trong 365 ngày gần nhất: <?php echo ($tongTatCaDoanhThuFormatted_365ngay); ?> VNĐ</h4>
                <br>
                <h4 id="tongTienLoi_365ngay">Tổng tiền lời trong 365 ngày gần nhất: <?php echo ($tongTienLoiFormatted_365ngay); ?> VNĐ</h4>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('myChart').getContext('2d');
    var labels = <?php echo json_encode($ngay); ?>;
    var data = <?php echo json_encode($tongDoanhThu); ?>;

    var ctx30 = document.getElementById('myChart30ngay').getContext('2d');
    var labels30ngay = <?php echo json_encode($ngay_30ngay); ?>;
    var data30ngay = <?php echo json_encode($tongDoanhThu_30ngay); ?>;
    
    var ctx365 = document.getElementById('myChart365ngay').getContext('2d');
    var labels365ngay = <?php echo json_encode($ngay_365ngay); ?>;
    var data365ngay = <?php echo json_encode($tongDoanhThu_365ngay); ?>;

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var myChart30ngay = new Chart(ctx30, {
        type: 'bar',
        data: {
            labels: labels30ngay,
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: data30ngay,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var myChart365ngay = new Chart(ctx365, {
        type: 'bar',
        data: {
            labels: labels365ngay,
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: data365ngay,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


});

 document.getElementById('tktl').addEventListener('click', function() {
    
 });



</script>