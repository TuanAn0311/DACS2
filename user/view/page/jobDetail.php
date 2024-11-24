<head>
    <link rel="stylesheet" href="<?php echo Helper::get_url('user/public/css/jobDetail.css') ?>">
    <link rel="stylesheet" href="<?php echo Helper::get_url('user/public/js/jobDetail.js') ?>">
    <style>
        /* Styles for the form overlay */
        
    </style>
</head>
<body>
    
<?php
    

    $_SESSION['ma_nguoi_tim_viec'] = $_SESSION['id_profile'];// khi login vao thi luu vao session , lay ma nguoi tim viec tu ma nguoi dung
    
    $job = new Job();
    $jobdb = new JobDatabase();
    $com = new Company();
    $comdb = new CompanyDatabase();
    $free = new Freelancer();
    $freedb = new FreelancerDatabase();
    $user = new User();
    $userdb = new UserDatabase();
    $applidb = new ApplicantDatabase();
    
    $job = $jobdb->display_by_id($data['macv']);
    
    $com = $comdb->getById($job->getMaNhaTuyenDung());

    $user = $userdb->getById($com->getUserId()); 
    
    
    $luong = number_format($job->getMucLuong(), 0, ',', '.');

    $_SESSION['ma_cong_viec'] = $data['macv'];


    if (isset($_SESSION['massge'])) {
        echo "<script> alert(".$_SESSION['massge'].")</script>";
        unset($_SESSION['massge']);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ma_cong_viec = $data['macv'];
        $tieu_de_cong_viec = $_POST['tieu_de_cong_viec'];
        $mo_ta_cong_viec = $_POST['mo_ta_cong_viec'];
        $muc_luong = $_POST['muc_luong'];
        $ma_chuyen_nganh = $_POST['ma_chuyen_nganh'];
        $trang_thai = $_POST['trang_thai'];
        $ky_nang_bat_buoc = $_POST['ky_nang_bat_buoc'];
    
        $jobUpdate = new Job();
        $jobUpdate->setMaCongViec($ma_cong_viec);
        $jobUpdate->setTieuDeCongViec($tieu_de_cong_viec);
        $jobUpdate->setMoTaCongViec($mo_ta_cong_viec);
        $jobUpdate->setMucLuong($muc_luong);
        $jobUpdate->setMaChuyenNganh($ma_chuyen_nganh);
        $jobUpdate->setTrangThai($trang_thai);
        $jobUpdate->setKyNangBatBuoc($ky_nang_bat_buoc);
        // var_dump($jobUpdate);

        $jobdbUpdate = new JobDatabase();
        $jobdbUpdate->updateJob($jobUpdate);
    }
    
?>
    <div class="container">
        <div class="row">
            <div class="col-0"></div>
            <div class="col-12">
                <div class="container" id="chiTietDuAn">
                    <div class="row">
                    <div class="col-md-8">  
                        <div class="hearChiTietDuAn">
                            <span>Chi tiết dự án</span>
                            <?php 
                                if($_SESSION['vai_tro']==='nguoi_tim_viec'){
                                    echo '<button class="chaoGia"  onclick="openForm(\'formChaoGia\')">Chào giá cho dự án</button>';
                                }elseif($_SESSION['ma_nguoi_dung']===$com->getUserId()){
                                    echo '<button class="chinhSua bg-success text-light "  onclick="openForm(\'formUpdate\')">Chỉnh sửa thông tin</button>';
                                }
                            ?>
                        </div>
                        <div class="tieuDe">
                            <p><b>Tiêu Đề: </b><?php echo $job->getTieuDeCongViec() ?></p>
                        </div>
                        <div class="moTaDuAn">
                            <p><b>Mô tả</b></p>
                            <p class="noiDungMoTa"><?php echo $job->getMoTaCongViec() ?></p>   
                        </div>

                        <?php 
                                if($_SESSION['vai_tro']==='nguoi_tim_viec'){
                                    echo '<div class="thongTinKhachHang">
                            <p>Thông tin khách hàng</p>
                            <img src="/DACS2/user/public/img/'. $com->getImg() . '" width="5%" alt=""> &#160
                            <span class="tenKhachHang"> '. $user->getUserName() .'</span>
                        </div>';
                                }
                            ?>
                        
                        <div class="kiNang">
                            <p><b>Kỹ năng bắt buộc</b></p>
                            <div class="container-TAG">
                                <span><?php echo $job->getKyNangBatBuoc() ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" id="tomTatDuAn">
                        <table class="table table-striped" style=" margin-top:10px">
                            <thead>
                                <tr>
                                    <th colspan="2">Tóm tắt dự án</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ngân sách</td>
                                    <td><?php echo $luong ?>.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td>Chào giá</td>
                                    <td><?php echo $applidb->countForJob($job->getMaCongViec()) ?></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <td><?php echo $job->getTrangThai() ?></td>
                                </tr>
                                <tr>
                                    <td>Ngày Đăng</td>
                                    <td><?php echo $job->getNgayTao() ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-0"></div>
        </div>
        <div class="row">
            <?php
                
                $list = $applidb->display_by_idJob($job->getMaCongViec());
            if(!empty($list)){
                foreach ($list as $appli) {
                    $free = $freedb->getById($appli->getFreeID());
                
            ?>
            <div class="container" id="danh_sach_chao_gia">
                <div class="row" id="header_gui_chao_gia">
                    <div class="col-9">
                        <img src="/DACS2/user/public/img/<?php echo $free->getImg() ?>" width="5%" style="border-radius:50%; object-fit: cover;" alt="">
                        <span id="ten">&#160<?php echo $free->getName() ?></span>
                    </div>
                    <div class="col-3">
                        <span class="box_gia_va_thoi_gian">
                            <span class="gia_chao"><?php echo number_format($appli->getPrice(), 0, ',', '.') ?> VNĐ</span>
                            <span>&#160 / &#160</span>
                            <span class="so_ngay_hoan_thanh"><?php echo $appli->getNumFinishDay() ?> ngày</span>
                        </span>
                    </div>
                </div>
                <div class="row" id="mo_ta_chao_gia">
                    <div class="p-3">
                        <?php echo $appli->getDesc() ?>
                    </div>
                </div>

                <div class="row" id="ngay_gio_chao_gia">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <span class="bi bi-alarm"><?php echo $appli->getAppliDate() ?></span>                        
                    </div>
                </div>
            </div>
            <?php
                }
            }else {
                echo "<h4 class='text-warning'><i>Chưa có ứng tuyển nào cho công việc này!</i></h4>";
            }
            ?>
        </div>
    </div>
    <div class="overlay" id="formChaoGia">
        <div class="form-container">
            <span class="close-button" onclick="closeForm('formChaoGia')">×</span>
            <h2>Chào Giá Dự Án</h2>
            <form id="chaoGiaForm" action="<?php echo Helper::get_url("user/model/bl/xuLyUngTuyen.php") ?>" method="POST">
                <div class="container">
                   <div class="row">
                        <div class="col-6"><label for="proposalAmount">Giá chào</label></div>
                        <div class="col-6"><input type="number" id="proposalAmount" name="GiaChao" required><br></div>
                   </div>
                </div>
                <div class="container">
                   <div class="row">
                        <div class="col-6"><label for="completionTime">Thời gian hoàn thành (ngày)</label></div>
                        <div class="col-6"><input type="number" id="completionTime" name="soNgayHoanThanh" required><br></div>     
                   </div>
                </div>

                <div class="container">
                   <div class="row">
                        <div class="col-4"><label for="proposalMessage">Lời nhắn</label><br></div>
                        <div class="col-8"><textarea class="p-4" id="proposalMessage" name="moTa" rows="4" required></textarea><br></div>     
                   </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-5"><button style="width:100%" type="submit">Gửi chào giá</button></div>
                        <div class="col-3"></div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="overlay" id="formUpdate">
        <div class="form-container">
            <span class="close-button" onclick="closeForm('formUpdate')">×</span>
            <h2>Chỉnh Sửa Dự Án</h2>
            <form id="formUpdateForm" action="<?php echo Helper::get_url('Home/jobDetail/'. $data['macv'] )?>" method="POST">
                <input type="hidden" name="ma_cong_viec" value="<?php echo $job->getMaCongViec(); ?>">

                <div class="container">
                    <div class="row">
                        <div class="col-6"><label for="tieu_de_cong_viec">Tiêu đề công việc:</label></div>
                        <div class="col-6"><textarea id="tieu_de_cong_viec" name="tieu_de_cong_viec" rows="1" required><?php echo $job->getTieuDeCongViec(); ?></textarea></div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-6"><label for="mo_ta_cong_viec">Mô tả công việc:</label></div>
                        <div class="col-6"><textarea id="mo_ta_cong_viec" name="mo_ta_cong_viec" rows="2" required><?php echo $job->getMoTaCongViec(); ?></textarea></div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-6"><label for="muc_luong">Mức lương:</label></div>
                        <div class="col-6"><input type="number" style="width:100%" id="muc_luong" name="muc_luong" value="<?php echo number_format($job->getMucLuong(), 0, ',', '.'); ?>" step="0.001" required></div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-6"><label for="trang_thai">Trạng thái:</label></div>
                        <div class="col-6">
                            <select id="trang_thai" name="trang_thai">
                                <option value="Đang tuyển" <?php echo $job->getTrangThai() == 'Đang tuyển' ? 'selected' : ''; ?>>Đang tuyển</option>
                                <option value="Đã hoàn thành" <?php echo $job->getTrangThai() == 'Đã hoàn thành' ? 'selected' : ''; ?>>Đã hoàn thành</option>
                                <option value="Đã đóng" <?php echo $job->getTrangThai() == 'Đã đóng' ? 'selected' : ''; ?>>Đã đóng</option>
                            </select>
                        </div>
                    </div>
                </div>
<?php
$spelist = new Specialized();
$spedb = new SpecializedDatabase();
$spelist = $spedb->displayAll();
?>
                <div class="container">
                    <div class="row">
                        <div class="col-6"><label for="ma_chuyen_nganh">Chuyên ngành:</label></div>
                        <div class="col-6">
                            <select id="ma_chuyen_nganh" name="ma_chuyen_nganh" required>
                                <?php
                                
                                // Vòng lặp in các option
                                foreach ($spelist as $chuyenNganh) {
                                    $selected = ($chuyenNganh->getSpeId() == $job->getMaChuyenNganh()) ? 'selected' : '';
                                    echo "<option value='" . $chuyenNganh->getSpeId() . "' $selected>" . $chuyenNganh->getSpeName() . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-6"><label for="ky_nang_bat_buoc">Kỹ năng bắt buộc:</label></div>
                        <div class="col-6"><textarea id="ky_nang_bat_buoc" name="ky_nang_bat_buoc" rows="1"><?php echo $job->getKyNangBatBuoc(); ?></textarea></div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6"><button style="width: 100%;" type="submit">Cập nhật</button></div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</body>
<script src="<?php echo Helper::get_url("user/public/js/jobDetail.js") ?>"></script>
