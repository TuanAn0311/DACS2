<?php
class FreelancerDatabase extends Database{
    function displayAll(){
        $sql = "SELECT * FROM nguoi_tim_viec";
        $FreeLancers = [];
        $result = self::db_get_list($sql);
        if ($result) { 
            foreach ($result as $row) {
                $freelancer = new Freelancer();
                $freelancer->setFreeId($row['ma_nguoi_tim_viec']);
                $freelancer->setUserId($row['ma_nguoi_dung']);
                $freelancer->setName($row['ho_ten']);
                $freelancer->setBack($row['ly_lich']);
                $freelancer->setSkill($row['ky_nang']);
                $freelancer->setExp($row['kinh_nghiem']);
                $freelancer->setImg($row['anh']);
                $freelancer->setExp($row['kinh_nghiem']);
                $freelancer->setImg($row['anh']);
                $freelancer->setAddress($row['dia_chi']);
                $freelancer->setFacebook($row['facebook']);
                $FreeLancers[] = $freelancer;
            }
        } 
        else {
            return []; 
        }
        return $FreeLancers;
    }

    function display($lim) {
        $sql = "SELECT * FROM nguoi_tim_viec LIMIT " . intval($lim);
        $params = [];
        $FreeLancers = [];
        $result = self::db_get_list_condition($sql, $params);
        if ($result) { 
            foreach ($result as $row) {
                $freelancer = new Freelancer();
                $freelancer->setFreeId($row['ma_nguoi_tim_viec']);
                $freelancer->setUserId($row['ma_nguoi_dung']);
                $freelancer->setName($row['ho_ten']);
                $freelancer->setBack($row['ly_lich']);
                $freelancer->setSkill($row['ky_nang']);
                $freelancer->setExp($row['kinh_nghiem']);
                $freelancer->setImg($row['anh']);
                $freelancer->setAddress($row['dia_chi']);
                $freelancer->setFacebook($row['facebook']);
                $FreeLancers[] = $freelancer;
            }
        } else {
            return [];
        }
        return $FreeLancers; 
    }
    
    function getById($id){
        $sql = "SELECT * FROM nguoi_tim_viec WHERE ma_nguoi_tim_viec = :id";
        $params = [
            "id" => (int)$id,
        ];
        $result = self::db_get_row($sql, $params);
        if ($result) { 
            $freelancer = new Freelancer();
            $freelancer->setFreeId($result['ma_nguoi_tim_viec']);
            $freelancer->setUserId($result['ma_nguoi_dung']);
            $freelancer->setName($result['ho_ten']);
            $freelancer->setBack($result['ly_lich']);
            $freelancer->setSkill($result['ky_nang']);
            $freelancer->setExp($result['kinh_nghiem']);
            $freelancer->setImg($result['anh']);
            $freelancer->setAddress($result['dia_chi']);
            $freelancer->setFacebook($result['facebook']);
            return $freelancer;
        }
        else {
            return null;
        }
    }

    function getByIdUser($id){
        $sql = "SELECT * FROM nguoi_tim_viec WHERE ma_nguoi_dung = :id";
        $params = [
            "id" => (int)$id,
        ];
        $result = self::db_get_row($sql, $params);
        if ($result) { 
            $freelancer = new Freelancer();
            $freelancer->setFreeId($result['ma_nguoi_tim_viec']);
            $freelancer->setUserId($result['ma_nguoi_dung']);
            $freelancer->setName($result['ho_ten']);
            $freelancer->setBack($result['ly_lich']);
            $freelancer->setSkill($result['ky_nang']);
            $freelancer->setExp($result['kinh_nghiem']);
            $freelancer->setImg($result['anh']);
            $freelancer->setAddress($result['dia_chi']);
            $freelancer->setFacebook($result['facebook']);
            return $freelancer;
        }
        else {
            return null;
        }
    }

    function addFreelancer($freelancer){
        $sql = "INSERT INTO nguoi_tim_viec (ma_nguoi_dung, ho_ten)
                VALUES (:userId, :name) ";
        $params = [
            "userId" => (int)$freelancer->getUserId(),
            "name" => $freelancer->getName(),
        ];
        if (self::db_execute($sql, $params)){
            return true;
        }
        else{
            return false;
        }
    }

    public function GET_danh_sach_ma_nguoi_tim_viec($macv){
        $query = "SELECT ma_nguoi_tim_viec FROM ung_tuyen WHERE ma_cong_viec =".$macv;
        return mysqli_query($this->con,$query);
    }
}
?>