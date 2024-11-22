<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ma_nha_tuyen_dung = $_SESSION['ma_nha_tuyen_dung']   ;
    $tieu_de_cong_viec = $_POST['tieu_de_cong_viec'];
    $mo_ta_cong_viec = $_POST['mo_ta_cong_viec'];
    $muc_luong = $_POST['muc_luong'];
    $ma_chuyen_nganh = $_POST['ma_chuyen_nganh'];
    $trang_thai = 'Đang tuyển';
    $ky_nang_bat_buoc = $_POST['ky_nang_bat_buoc'];

    $job = new Job();
    $job->setMaNhaTuyenDung($ma_nha_tuyen_dung);
    $job->setTieuDeCongViec($tieu_de_cong_viec);
    $job->setMoTaCongViec($mo_ta_cong_viec);
    $job->setMucLuong($muc_luong);
    $job->setMaChuyenNganh($ma_chuyen_nganh);
    $job->setTrangThai($trang_thai);
    $job->setKyNangBatBuoc($ky_nang_bat_buoc);

    $jobdb = new JobDatabase();
    $jobdb->addJob($job);
    echo "<script>alert(Đã Thêm Công Việc)</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo Helper::get_url('user/public/css/first.css') ?>">
    <link rel="stylesheet" href="<?php echo Helper::get_url('user/public/css/formOverLay.css') ?>">
    
</head>
<body>
    <div class="container-fluid" id="background-image-div">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6" id="content-index">
                <span >Tìm kiếm những Freelancer tài năng cùng với vô số dịch vụ về</span><br>
                <span id="text" style="border: none;"></span>
                <span class="blinking-cursor">|</span><br>
                <button id="troThanhFreelancer">Trở thành Freelancer</button>
                <button id="dangDuAnMoi" onclick="openForm()">Đăng dự án mới</button><br>
                <div style="display: flex; align-items: center;">
                    <div class="timKiemTrangChu">
                        <div class="bi bi-search" style="font-size: 20px; color: gray; align-items: center;"></div>
                        <input type="search" placeholder="Bạn đang tìm dịch vụ gì?">
                    </div>
                    <button id="submit" type="submit">Tìm kiếm</button>
                </div>
            </div>
            <div class="col-5"></div>
        </div>
    </div>
<?php
$con = mysqli_connect("localhost","root","","dacs2");

//////////////
    if (isset($_SESSION['message'])) {
        echo  "<script>alert('".$_SESSION['message']."')</>";
        unset($_SESSION['message']);
    }

?>
    <div class="overlay" id="formOverlay">
        <div class="form-container">
            
            <form action="#" method="POST">
                <span class="close-button" onclick="closeForm()">×</span>
                <h2>Nhập thông tin bài đăng</h2>
                <input type="hidden" name="ma_nha_tuyen_dung" Value="1" required>
                
                <div class="mb-4 mt-4" style="text-align:center">
                    <span>Hôm nay là: <?php echo date('d-m-Y H:i:s') ?></span>
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">tiêu đề </label>
                    <input type="text" id="disabledTextInput" name="tieu_de_cong_viec" class="form-control" placeholder="Nhập tiêu đề" required>
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Mô tả công việc </label>
                    <textarea type="text" id="disabledTextInput" name="mo_ta_cong_viec" class="form-control" placeholder="Nhập mô tả" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Mức giá cho đặt trước</label>
                    <input type="number" id="disabledTextInput" name="muc_luong" class="form-control" placeholder="0" required>
                </div>
                <div class="mb-3">
                    <label for="disabledSelect" class="form-label">Chuyên ngành chính</label>
                    <select id="disabledSelect" class="form-select" name="ma_chuyen_nganh">
                        <option disabled>Chọn chuyên ngành </option>
                        <?php 
                            $sql_chuyen_nghanh = "SELECT * FROM chuyen_nganh";
                            $query = mysqli_query($con,$sql_chuyen_nghanh);
                            while ($chuyen_nganh=mysqli_fetch_array($query)) {
                            echo '<option Value="'.$chuyen_nganh['ma_chuyen_nganh'].'">'.$chuyen_nganh['ten_chuyen_nganh'].'</option>';
                            }
                        ?>
                    </select>
                </div>   
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Kỷ năng bắt buộc</label>
                    <input type="text" id="disabledTextInput" name="ky_nang_bat_buoc" class="form-control" placeholder="Nhập ký năng bắt buộc" required>
                </div>
                <div style="text-align:center"><button type="submit" class="btn btn-primary">Đăng bài</button></div>
            </form>
        </div>
    </div>

</body>
<script src="<?php echo Helper::get_url('user/public/js/first.js') ?>"></script>
<script src="<?php echo Helper::get_url('user/public/js/formOverLay.js') ?>"></script>
</html>