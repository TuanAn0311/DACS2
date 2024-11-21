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
        $result = self::db_get_list_condition($sql, $params);
        $Applis = [];
        if ($result){
            foreach ($result as $row) {
                $appli = new Applicant();
                $appli->setAppliId($row['ma_ung_tuyen']);
                $appli->setFreeId($row['ma_nguoi_tim_viec']);
                $appli->setJobpliId($row['ma_cong_viec']);
                $appli->setState($row['trang_thai_ung_tuyen']);
                $appli->setAppliDate($row['ngay_ung_tuyen']);
                $appli->setDesc($row['mo_ta']);
                $appli->setPrice($row['chao_gia']);
                $appli->setNumFinishDay($row['so_ngay_hoan_thanh']);
                $Applis[]=$appli;
                
                
            }
        }else {
            return [];
        }
        return $Applis;
    }
}
?>