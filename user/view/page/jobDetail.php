<head>
    <link rel="stylesheet" href="<?php echo Helper::get_url('user/public/css/jobDetail.css') ?>">

    <style>
        /* Styles for the form overlay */
        
    </style>
</head>
<body>
    
<?php
    

    $_SESSION['ma_nguoi_tim_viec'] = 3;// khi login vao thi luu vao session , lay ma nguoi tim viec tu ma nguoi dung
    
    $job = new Job();
    $jobdb = new JobDatabase();
    $com = new Company();
    $comdb = new CompanyDatabase();
    $free = new Freelancer();
    $freedb = new FreelancerDatabase();
    $user = new User();
    $userdb = new UserDatabase();
    $applidb = new ApplicantDatabase();
    
    $com = $comdb->getById($data['macv']);
    $job = $jobdb->display_by_id($data['macv']);
    
    $com = $comdb->getById($job->getMaNhaTuyenDung());

    $user = $userdb->getById($com->getUserId()); 
    
    
    $luong = number_format($job->getMucLuong(), 0, ',', '.');

    $_SESSION['ma_cong_viec'] = $data['macv'];


    if (isset($_SESSION['massge'])) {
        echo "<script> alert(".$_SESSION['massge'].")</script>";
        unset($_SESSION['massge']);
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
                            <button class="chaoGia"  onclick="openForm()">Chào giá cho dự án</button>
                        </div>
                        <div class="moTaDuAn">
                            <p><b>Mô tả</b></p>
                            <p class="noiDungMoTa"><?php echo $job->getMoTaCongViec() ?></p>   
                        </div>

                        <div class="thongTinKhachHang">
                            <p>Thông tin khách hàng</p>
                            <img src="/DACS2/user/public/img/<?php echo $com->getImg()  ?>" width="5%" alt=""> &#160
                            <span class="tenKhachHang"><?php echo $user->getUserName() ?></span>
                        </div>
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
            ?>
        </div>
    </div>


</body>
<script src="<?php echo Helper::get_url("user/public/js/jobDetail.js") ?>"></script>
