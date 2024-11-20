<?php
class ApplicantDatabase extends Database{

    function countByFreeId($id){
        $sql = "SELECT count(*) as total FROM ung_tuyen WHERE ma_nguoi_tim_viec = :id and trang_thai_ung_tuyen = 'Hoàn thành'";
        $params = [
            "id" => (int)$id,
        ];
        $result = self::db_get_row($sql, $params);
        if ($result){
            $total = $result['total'];
        } 
        return $total;
    }
    function countForJob($id){
        $sql = "SELECT count(*) as total FROM ung_tuyen WHERE ma_cong_viec = :id";
        $params = [
            "id" => (int)$id,
        ];
        $result = self::db_get_row($sql, $params);
        if ($result){
            $total = $result['total'];
        }
        return $total;
    }
    function display_by_idJob($id){
        $sql = "SELECT * FROM ung_tuyen WHERE ma_cong_viec = :id";
        $params = [
            "id" => (int)$id,
        ];
        $result = self::db_get_row($sql, $params);
        if ($result){
            $appli = new Applicant();
            $appli->setAppliId($result['ma_ung_tuyen']);
            $appli->setFreeId($result['ma_nguoi_tim_viec']);
            $appli->setJobpliId($result['ma_cong_viec']);
            $appli->setState($result['trang_thai_ung_tuyen']);
            $appli->setAppliDate($result['ngay_ung_tuyen']);
            $appli->setDesc($result['mo_ta']);
            $appli->setPrice($result['chao_gia']);
            $appli->setNumFinishDay($result['so_ngay_hoan_thanh']);
                
            return $appli;
        }else {
            return [];
        }
    }
}
?>