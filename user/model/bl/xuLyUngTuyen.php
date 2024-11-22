<?php
$con = mysqli_connect("localhost", "root", "", "dacs2");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma_nguoi_tim_viec = $_SESSION['ma_nguoi_tim_viec'];
    $ngayUT = date("Y-m-d H:i:s");
    $trangThai = 'Đang Chờ';
    $maCV = $_SESSION['ma_cong_viec'];
    $moTa = $_POST['moTa'];
    $giaChao = $_POST['GiaChao'];
    $soNgayHoanThanh = $_POST['soNgayHoanThanh'];

    $sql = "INSERT INTO 
    ung_tuyen(ma_nguoi_tim_viec,
    ma_cong_viec,
    trang_thai_ung_tuyen,
    ngay_ung_tuyen,
    mo_ta,
    chao_gia,
    so_ngay_hoan_thanh)
     VALUES($ma_nguoi_tim_viec,$maCV,'$trangThai','$ngayUT','$moTa',$giaChao,$soNgayHoanThanh)";
    $query = mysqli_query($con,$sql);
    header("Location: http://localhost/DACS2/Home/jobDetail/$maCV");
    exit;

    // $result = $applidb->addAppli($ma_nguoi_tim_viec,$maCV,$trangThai,$ngayUT,$moTa,$giaChao,$soNgayHoanThanh);
    // if ($result) {
    //     $_SESSION['massge'] = 'Chào giá đã được tải lên';
    //     header("Location: http://localhost/live/Home/jobDetail/$maCV");
    //     exit;
    // } else {
    //     echo "có lỗi xảy ra";
    // }
}

class xuLy_UT{
    function them_UT($ma_nguoi_tim_viec,$maCV,$trangThai,$ngayUT,$moTa,$giaChao,$soNgayHoanThanh){
        $sql = "INSERT INTO 
    ung_tuyen(ma_nguoi_tim_viec,
    ma_cong_viec,
    trang_thai_ung_tuyen,
    ngay_ung_tuyen,
    mo_ta,
    chao_gia,
    so_ngay_hoan_thanh)
     VALUES($ma_nguoi_tim_viec,$maCV,'$trangThai','$ngayUT','$moTa',$giaChao,$soNgayHoanThanh)";
    $query = mysqli_query($con,$sql);
    }
}
?>