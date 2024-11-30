<?php

class JobDatabase extends Database{

    private $ma_cong_viec, $ma_nha_tuyen_dung, $tieu_de_cong_viec, $mo_ta_cong_viec, $muc_luong, $ngay_tao, $ma_chuyen_nganh, $trang_thai, $ky_nang_bat_buoc;
    
    
    public function GET_CVLimitByCompanyId($id){
        $id = (int)$id;
        $sql = "SELECT * FROM cong_viec WHERE ma_nha_tuyen_dung = $id";
        $Jobs = [];
        $result = self::db_get_list($sql);
        if ($result) { 
            foreach ($result as $row) {
                $Job = new Job();
                $Job->setMaCongViec($row['ma_cong_viec']);
                $Job->setMaNhaTuyenDung($row['ma_nha_tuyen_dung']);
                $Job->setTieuDeCongViec($row['tieu_de_cong_viec']);
                $Job->setMoTaCongViec($row['mo_ta_cong_viec']);
                $Job->setMucLuong($row['muc_luong']);
                $Job->setNgayTao($row['ngay_tao']);
                $Job->setMaChuyenNganh($row['ma_chuyen_nganh']);
                $Job->setTrangThai($row['trang_thai']);
                $Job->setKyNangBatBuoc($row['ky_nang_bat_buoc']);
                $Jobs[] = $Job;
            }
        } 
        else {
            return []; 
        }
        return $Jobs;
    }
    
    function countRow(){
        $sql = "SELECT COUNT(*) as total FROM cong_viec";
        
        $result = self::db_get_row($sql);
        if ($result){
            $total = $result['total'];
        }
        return $total;
    }



    public function GET_CVLimit($limit,$offset){
        $limit=(int)$limit;
        $offset=(int)$offset;
        $sql = "SELECT * FROM cong_viec LIMIT $limit, $offset";
        $Jobs = [];
        $result = self::db_get_list($sql);
        if ($result) { 
            foreach ($result as $row) {
                $Job = new Job();
                $Job->setMaCongViec($row['ma_cong_viec']);
                $Job->setMaNhaTuyenDung($row['ma_nha_tuyen_dung']);
                $Job->setTieuDeCongViec($row['tieu_de_cong_viec']);
                $Job->setMoTaCongViec($row['mo_ta_cong_viec']);
                $Job->setMucLuong($row['muc_luong']);
                $Job->setNgayTao($row['ngay_tao']);
                $Job->setMaChuyenNganh($row['ma_chuyen_nganh']);
                $Job->setTrangThai($row['trang_thai']);
                $Job->setKyNangBatBuoc($row['ky_nang_bat_buoc']);
                $Jobs[] = $Job;
            }
        } 
        else {
            return []; 
        }
        return $Jobs;
    }

    
    function displayAll(){
        $sql = "SELECT * FROM cong_viec";
        $Jobs = [];
        $result = self::db_get_list($sql);
        if ($result) { 
            foreach ($result as $row) {
                $Job = new Job();
                $Job->setMaCongViec($row['ma_cong_viec']);
                $Job->setMaNhaTuyenDung($row['ma_nha_tuyen_dung']);
                $Job->setTieuDeCongViec($row['tieu_de_cong_viec']);
                $Job->setMoTaCongViec($row['mo_ta_cong_viec']);
                $Job->setMucLuong($row['muc_luong']);
                $Job->setNgayTao($row['ngay_tao']);
                $Job->setMaChuyenNganh($row['ma_chuyen_nganh']);
                $Job->setTrangThai($row['trang_thai']);
                $Job->setKyNangBatBuoc($row['ky_nang_bat_buoc']);
                $Jobs[] = $Job;
            }
        } 
        else {
            return []; 
        }
        return $Jobs;
    }


    function display_by_id($id){
        $sql = "SELECT * FROM cong_viec WHERE ma_cong_viec= :id";
        $params = [
            "id" => (int)$id,
        ];
        $result = self::db_get_row($sql, $params);
        if ($result){
            $Job = new Job();
                $Job->setMaCongViec($result['ma_cong_viec']);
                $Job->setMaNhaTuyenDung($result['ma_nha_tuyen_dung']);
                $Job->setTieuDeCongViec($result['tieu_de_cong_viec']);
                $Job->setMoTaCongViec($result['mo_ta_cong_viec']);
                $Job->setMucLuong($result['muc_luong']);
                $Job->setNgayTao($result['ngay_tao']);
                $Job->setMaChuyenNganh($result['ma_chuyen_nganh']);
                $Job->setTrangThai($result['trang_thai']);
                $Job->setKyNangBatBuoc($result['ky_nang_bat_buoc']);
            return $Job;
        }
        else {
            return []; 
        }
    }

    function addJob($job) {
        $sql = "INSERT INTO cong_viec (
                    ma_nha_tuyen_dung, 
                    tieu_de_cong_viec, 
                    mo_ta_cong_viec, 
                    muc_luong, 
                    ngay_tao, 
                    ma_chuyen_nganh, 
                    trang_thai, 
                    ky_nang_bat_buoc
                ) VALUES (
                    :ma_nha_tuyen_dung, 
                    :tieu_de_cong_viec, 
                    :mo_ta_cong_viec, 
                    :muc_luong, 
                    :ngay_tao, 
                    :ma_chuyen_nganh, 
                    :trang_thai, 
                    :ky_nang_bat_buoc
                )";
    
        $ngay_tao = date("Y-m-d H:i:s");
    
        $params = [
            "ma_nha_tuyen_dung" => $job->getMaNhaTuyenDung(),
            "tieu_de_cong_viec" => $job->getTieuDeCongViec(),
            "mo_ta_cong_viec" => $job->getMoTaCongViec(),
            "muc_luong" => $job->getMucLuong(),
            "ngay_tao" => $ngay_tao,
            "ma_chuyen_nganh" => $job->getMaChuyenNganh(),
            "trang_thai" => $job->getTrangThai(),
            "ky_nang_bat_buoc" => $job->getKyNangBatBuoc(),
        ];
    
        if (self::db_execute($sql, $params)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function updateJob($job) {
        $sql = "UPDATE cong_viec 
                SET 
                    tieu_de_cong_viec = :tieu_de_cong_viec, 
                    mo_ta_cong_viec = :mo_ta_cong_viec, 
                    muc_luong = :muc_luong, 
                    ma_chuyen_nganh = :ma_chuyen_nganh, 
                    trang_thai = :trang_thai, 
                    ky_nang_bat_buoc = :ky_nang_bat_buoc
                WHERE ma_cong_viec = :ma_cong_viec";
    
        $params = [
            "tieu_de_cong_viec" => $job->getTieuDeCongViec(),
            "mo_ta_cong_viec" => $job->getMoTaCongViec(),
            "muc_luong" => $job->getMucLuong(),
            "ma_chuyen_nganh" => $job->getMaChuyenNganh(),
            "trang_thai" => $job->getTrangThai(),
            "ky_nang_bat_buoc" => $job->getKyNangBatBuoc(),
            "ma_cong_viec" => $job->getMaCongViec(),
        ];
    
        // Thực hiện cập nhật
        $result = self::db_execute($sql, $params);
        
        // Nếu thành công, chuyển hướng lại trang
        if ($result) {
            // Thay thế "your_page.php" bằng URL của trang bạn muốn chuyển hướng tới
            echo "<script>alert('Cập nhật thông tin thành công!'); </script>"; 
            header("Location: http://localhost/DACS2/Home/jobDetail/".$job->getMaCongViec());
            exit(); // Dừng việc thực thi mã sau khi chuyển hướng
        } else {
            return false; // Nếu không thành công, trả về false
        }
    }
    
    function delete($id) {
        $sql = "DELETE FROM cong_viec WHERE ma_cong_viec= :ma_cong_viec";
        $params = [
            "ma_cong_viec" => $id
        ];
    
        if (self::db_execute($sql, $params)) {
            return true;
        } else {
            return false;
        }
    }
       
}
?>