<?php
    class cong_viec extends Controller {

        function them_cong_viec() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ma_nha_tuyen_dung = $_SESSION['ma_nha_tuyen_dung']   ;
                $tieu_de_cong_viec = $_POST['tieu_de_cong_viec'];
                $mo_ta_cong_viec = $_POST['mo_ta_cong_viec'];
                $muc_luong = $_POST['muc_luong'];
                $ma_chuyen_nganh = $_POST['ma_chuyen_nganh'];
                $trang_thai = 'Đang tuyển';
                $ky_nang_bat_buoc = $_POST['ky_nang_bat_buoc'];

                echo "hello";

                $jobdb = new JobDatabase();
                $jobdb->addJob(
                    $ma_nha_tuyen_dung,
                    $tieu_de_cong_viec,
                    $mo_ta_cong_viec,
                    $muc_luong,
                    $ma_chuyen_nganh,
                    $trang_thai,
                    $ky_nang_bat_buoc
                );

                header('Location: http://localhost/DACS2/Home/action/home');
                exit();
            } else {
                echo "không gửi được!";
            }
        }
    }
?>
